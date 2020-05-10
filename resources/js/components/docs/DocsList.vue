<template>
    <v-row v-if="items.length">
        <v-col
                v-for="(item, i) in items"
                :key="i"
                cols="5"
        >
            <v-card
                    height="250"
                    class="d-flex align-start flex-column pa-1"
            >
                <div class="d-flex justify-space-between" style="width: 100%;">
                    <div>
                        <v-card-title
                                class="title font-weight-regular"
                                v-text="item.name"
                        ></v-card-title>


                        <v-card-subtitle
                                class="body-2"
                                v-text="item.description"
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
                                v-html="updatedAt(item)"
                        >
                        </v-card-text>
                    </div>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-btn
                                small
                                text
                                :to="{name: 'edit-doc', params: {documentId: item.id}}"
                        >Edit</v-btn>

                        <v-btn
                                small
                                color="red"
                                text
                                @click="deleteBook(item.id)"
                        >
                            Delete
                        </v-btn>

                        <v-spacer></v-spacer>

                        <v-btn
                                color="green"
                                medium
                                text
                                @click="download(item.id)"
                        >
                                Download
                        </v-btn>
                    </v-card-actions>
                </div>
            </v-card>
        </v-col>
    </v-row>
    <v-row
        v-else
    >
        <v-col
                cols="8"
        >
            <v-alert
                    border="top"
                    colored-border
                    type="info"
                    elevation="2"
            >
                Sorry, you have no uploaded documents. In this document sharing site you can download a lot useful documents of other contributors. You can upload your document by clicking 'Add new'. Uploading process is straightforward 30 seconds process.
            </v-alert>
        </v-col>
    </v-row>
</template>


<script>
    import moment from 'moment';

    export default {
        created() {
            axios.get('/api/documents?userId=' + localStorage.userId).then(response => {
                this.items = response.data;
            });
            // setInterval(() => {
            //     console.log(this.items);
            // },1000)
        },
        data() {
            return {
                items: [],
            }
        },
        methods: {
            download(id) {
                let item = this.items.find(document => document.id == id);
                item.download_count++;

                let link = document.createElement('a');
                link.href = '/api/documents/' + item.id + '/download';
                link.click();

            },
            deleteBook(id) {
                if (confirm('Are you sure you want to delete this document?')) {
                    axios.delete('/api/documents/' + id, {
                        data: { userId: 1 }
                    })
                        .then(response => {
                            if(response.data.success) {
                                let deleteIndex = this.items.findIndex(item => (parseInt(item.id) === parseInt(id)) );
                                this.items.splice(deleteIndex, 1);
                            }
                        });
                }
            },
            updatedAt({updated_at, download_count}) {
                let text = '<div>Donwload count: <strong>' +  download_count + '</strong></div>';
                text +=  '<div>Last updated: <strong>' +  moment(updated_at).format("dddd, MMMM Do YYYY") + '</strong></div>';
                return text;
            }
        }
    }
</script>
