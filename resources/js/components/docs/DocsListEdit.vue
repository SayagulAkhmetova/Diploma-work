<template>
    <v-row>
        <v-col>
            <v-card
                    max-width="500"
            >
                <v-card-title>Edit document</v-card-title>


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
                        ></v-file-input>
<!--                        :rules="[rules.required]"-->


                        <v-select
                                v-model="document.category"
                                :items="categories"
                                item-text="name"
                                item-value="value"
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
                                @click="editDocument"
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
        props: [
            'documentId'
        ],
        created() {
            this.document.category= this.categories[0].value;

            axios.get('/api/documents/'+this.documentId).then(response => {
                let document = response.data;
                this.document.id = document.id;
                this.document.name = document.name;
                this.document.category = document.category_id;
                this.document.description = document.description;
            });
        },
        data() {
            return {
                valid: true,

                categories: [
                    {
                        name: 'Computer Science',
                        value: 0
                    },
                    {
                        name: 'Relational Database',
                        value: 1
                    },
                    {
                        name: 'NoRelational Database',
                        value: 2
                    },
                    {
                        name: 'UI/UX',
                        value: 3
                    },


                ],

                document: {
                    id: null,
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
            editDocument() {
                if (this.$refs.form.validate()) {

                    let formData = new FormData();
                    formData.append('document', this.document.document);
                    formData.append("name", this.document.name);
                    formData.append("description", this.document.description);
                    formData.append("category", this.document.category);

                    axios.post('/api/documents/' + this.document.id, formData,
                        { headers: {'Content-Type': 'multipart/form-data'}}
                    )
                        .then(response => {
                            this.$refs.form.reset();
                            this.$router.push({name: 'all-docs'});
                    });
                }
            },

        }
    }
</script>
