<template>
    <v-container style="max-width: 1600px">

        <v-row>
            <v-col cols="4">

                <v-card color="grey lighten-4">
                    <v-card-title class="pb-0">Advanced search</v-card-title>

                    <v-card-text class="pa-6">
                        <v-text-field
                                v-model="name"
                                label="Title contains"
                                outlined
                                dense
                                placeholder=" "
                        ></v-text-field>

                        <v-text-field
                                v-model="description"
                                label="Description contains"
                                outlined
                                dense
                                placeholder=" "
                        ></v-text-field>
                        <v-subheader>Download count range</v-subheader>

                        <v-range-slider
                                v-model="downloadRange"
                                :max="max"
                                :min="min"
                                hide-details
                                class="align-center"
                        >
                            <template v-slot:prepend>
                                <v-text-field
                                        :value="downloadRange[0]"
                                        class="mt-0 pt-0"
                                        hide-details
                                        single-line
                                        type="number"
                                        style="width: 60px"
                                        @change="$set(downloadRange, 0, $event)"
                                ></v-text-field>
                            </template>
                            <template v-slot:append>
                                <v-text-field
                                        :value="downloadRange[1]"
                                        class="mt-0 pt-0"
                                        hide-details
                                        single-line
                                        type="number"
                                        style="width: 60px"
                                        @change="$set(downloadRange, 1, $event)"
                                ></v-text-field>
                            </template>
                        </v-range-slider>

                        <v-subheader>Date range</v-subheader>
                        <v-date-picker width="270" class="mx-auto" v-model="datesRange" range></v-date-picker>



                    </v-card-text>

                    <v-card-actions>

                        <v-btn
                                @click="fetchBooks"
                                class="mx-auto px-8"
                                color="blue lighten-4"
                        >
                            Search
                        </v-btn>
                    </v-card-actions>
                </v-card>



            </v-col>
            <v-col cols="8">

                <template v-if="documents.length < 1">
                    <v-alert
                            class="mt-6 py-12"
                            text
                            prominent
                            type="error"
                            icon="mdi-cloud-alert"
                    >
                        Sorry no documents. Try to change the query parameters.
                    </v-alert>
                </template>
                <template v-else>
                    <v-row>
                        <v-col
                                v-for="document in documents"
                                cols="8"
                        >
                            <v-card
                                    height="250"
                                    class="d-flex align-start flex-column pa-1"
                            >
                                <div class="d-flex justify-space-between" style="width: 100%;">
                                    <div>
                                        <v-card-title
                                                class="title font-weight-regular"
                                                v-text="document.name"
                                        ></v-card-title>


                                        <v-card-subtitle
                                                class="body-2"
                                                v-text="document.description"
                                        ></v-card-subtitle>
                                    </div>



                                    <v-avatar
                                            class="ma-1"
                                            size="100"
                                            tile
                                    >
                                        <img src="/images/x-office-document-icon.png">
                                    </v-avatar>
                                </div>

                                <div class="mt-auto" style="width: 100%">
                                    <div>
                                        <v-card-text
                                                class="body-2"
                                                v-html="updatedAt(document)"
                                        >
                                        </v-card-text>
                                    </div>
                                    <v-divider></v-divider>
                                    <v-card-actions>


                                        <v-btn
                                                text
                                                color="orange"
                                                @click="bookmark(document.id)"
                                        >
                                            <v-icon class="">mdi-star</v-icon>
                                            Bookmark
                                        </v-btn>
                                        <v-spacer></v-spacer>

                                        <v-btn
                                                color="green"
                                                text
                                                @click="download(document.id)"
                                        >
                                            <v-icon class="mr-1">mdi-cloud-download</v-icon>
                                            Download
                                        </v-btn>
                                    </v-card-actions>
                                </div>
                            </v-card>
                        </v-col>
                    </v-row>
                </template>







            </v-col>
        </v-row>


    </v-container>
</template>


<script>
    import moment from 'moment';


    export default {

        created() {
            this.name = this.$route.query.query;
            this.fetchBooks();
        },
        data() {
            return {
                name: '',
                description: '',

                documents: [],



                // slider download count
                min: 0,
                max: 70,
                downloadRange: [0, 70], // model


                // date range
                datesRange: [], // model

            }
        },
        methods: {
            bookmark(id) {
                let data = {
                    userId: localStorage.userId,
                    documentId: id,
                };
                axios.post('/api/documents/bookmark', data).then(response => {

                })
            },
            fetchBooks() {
                let data = {
                    name: this.name,
                    description: this.description,
                    downloadRange: this.downloadRange,
                    datesRange: this.datesRange
                };
                // console.log(data);
                axios.get('/api/search', {params: data})
                    .then(response => {
                        this.documents = response.data.documents;
                    });
            },
            updatedAt({updated_at, download_count}) {
                let text = '<div>Donwload count: <strong>' +  download_count + '</strong></div>';
                text +=  '<div>Last updated: <strong>' +  moment(updated_at).format("dddd, MMMM Do YYYY") + '</strong></div>';
                return text;
            }
        },
        watch: {
            '$route.query.query': function () {
                this.name = this.$route.query.query;
                this.fetchBooks();
            }
        },

    }
</script>

<style>

</style>
