<template>
    <div>
        <v-row>
            <v-col cols="8">
                <h2 class="display-1">
                    Teacher's individual report
                </h2>
            </v-col>
            <v-col cols="4">
                <v-btn class="ma-2" color="indigo" :to="{name: 'report-new'}" outlined>Add new report</v-btn>
            </v-col>
        </v-row>

        <v-row>

            <v-col cols="4" v-for="report in reports">
            <v-card
                    class="mx-auto"
                    elevation="2"
                    max-width="344"
                    outlined
                    tile
            >
                <v-list-item three-line>
                    <v-list-item-content>
                        <div class="overline mb-4">Report</div>
                        <v-list-item-title class="headline mb-1">{{ getYearText(report.year) }}</v-list-item-title>
                        <v-list-item-subtitle>Report for {{ getYearText(report.year) }}.</v-list-item-subtitle>
                    </v-list-item-content>

                    <v-list-item-avatar
                            color="grey"
                            size="60"
                            tile
                    >
                        <v-img src="data:image/png;base64,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"></v-img>
                    </v-list-item-avatar>
                </v-list-item>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-btn
                            @click="deleteReport(report.reportId)"
                            color="red"
                            fab
                            link
                            text>
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>

                    <v-spacer></v-spacer>

                    <v-btn
                            :to="{ name: 'report-show', params: { reportId: report.reportId } }"
                            color="primary"
                            link
                            outlined
                            small
                    >
                        <v-icon class="mr-2">mdi-eye</v-icon>
                        View/Edit
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
        </v-row>
    </div>
</template>


<script>

    export default {
        created() {
            axios.get('/api/reports?userId=' + localStorage.userId)
                .then(response => {
                    this.reports = response.data;
                });
        },
        data() {
            return {
                reports: [],
            }
        },
        methods: {
            getYearText(year) {
                return year + ' - ' + (parseInt(year) + 1);
            },
            deleteReport(id) {
                axios.delete('/api/reports/' + id).then(response => {
                    let deleteIndex = this.reports.findIndex(item => (parseInt(item.id) === parseInt(id)) );
                    this.reports.splice(deleteIndex, 1);
                });
            },
        }

    }
</script>

<style scoped>
    th {
        border: 0.5px solid grey;
    }
    td {
        border: 0.5px solid grey;
    }
</style>
