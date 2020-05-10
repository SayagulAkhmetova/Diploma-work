<template>
    <v-row>
        <v-col>
            <v-card
                    max-width="500"
            >
                <v-card-title>Upload document</v-card-title>


                <v-card-text>
                    <v-form
                            ref="form"
                            v-model="valid"
                            lazy-validation
                    >
                        <v-text-field
                                v-model="document.name"
                                :counter="30"
                                :rules="nameRules"
                                label="Name of the document *"
                                required
                        ></v-text-field>


                        <v-file-input
                                ref="document"
                                label="Upload the file *"
                                v-on:change="handleUpload"
                                :rules="[rules.required]"
                        ></v-file-input>


                        <v-select
                                v-model="document.category"
                                :items="categories"
                                item-text="name"
                                item-value="id"
                                label="Category *"
                        ></v-select>



                        <v-textarea
                                class="mt-2"
                                v-model="document.description"
                                :rules="descriptionRules"
                                required
                                outlined
                                label="Description *"
                                value=""
                        ></v-textarea>



                        <v-btn
                                color="success"
                                class="mr-4"
                                @click="submitDocument"
                        >
                            Submit
                        </v-btn>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>
</template>


<script>

    export default {
        created() {
            axios.get('/api/categories').then(response => {
                this.categories = response.data;
            });
            this.document.category= this.categories[0].value;
        },
        data() {
            return {
                valid: true,

                categories: [],

                document: {
                    name: '',
                    description: '',
                    category: null,
                    document: null,
                },

                rules: {
                    required: value => !!value || 'Required.'
                },

                nameRules: [
                    v => !!v || 'Please fill in the name of the document',
                ],
                descriptionRules: [
                    v => !!v || 'Please fill in the the description',
                    v => (v && v.length >= 30) || 'Description must be more than 30 characters',
                ],
            }
        },
        methods: {
            handleUpload(file) {
                this.document.document = file;
            },
            submitDocument() {
                if (this.$refs.form.validate()) {

                    let data = new FormData();
                    data.append('name', this.document.name);
                    data.append('document', this.document.document);
                    data.append('category', this.document.category);
                    data.append('description', this.document.description);
                    data.append('user_id', localStorage.userId);

                    axios.post('/api/documents', data, {
                        headers: {'Content-Type': 'multipart/form-data'}
                    }).then(response => {
                        this.$refs.form.reset();
                        this.$router.push({name: 'report-show'});
                    });
                }
            },

        }
    }
</script>
