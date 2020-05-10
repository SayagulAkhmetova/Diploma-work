<template>
    <div style="padding-bottom: 250px;">
        <v-row>
            <v-col>

                <h1 class="display-2 text-center mt-4 mb-8">I-Educational methodical work</h1>
                <v-card v-for="form in forms" class="grey lighten-3 mb-8">
                    <v-card-title>{{form.title}}</v-card-title>

                    <v-card-text>
                        <v-form
                                ref="form"
                        >

                            <v-row>
                                <v-col v-for="field in form.headers">

                                    <template v-if="!field.value.includes('execution')">
                                        <v-text-field
                                                v-model="form.values[field.value]"
                                                :label="field.text"
                                        ></v-text-field>
                                    </template>

                                    <template v-else>
                                        <v-select
                                                v-model="form.values[field.value]"
                                                :items="[{value: 1, text: 'Complete'},{value: 0, text: 'Not Complete'}]"
                                                item-text="text"
                                                item-value="value"
                                                :label="field.text"
                                        ></v-select>
                                    </template>
                                </v-col>
                            </v-row>

                        </v-form>
                    </v-card-text>
                </v-card>

            </v-col>
        </v-row>

        <v-btn
                @click="submit"
                fixed
                large
                class="success"
                style="right: 100px; bottom: 100px;"
        >
            Save changes
        </v-btn>
    </div>
</template>

<script>

    export default {
        props: ['reportId',],
        created() {
            axios.get('/api/educations/' + this.reportId).then(response => {
                this.forms.one.values = { ...response.data.data.one };
                this.forms.two.values = { ...response.data.data.two };
                this.forms.three.values = { ...response.data.data.three };
                this.forms.four.values = { ...response.data.data.four };
                this.forms.five.values = { ...response.data.data.five };
            });


        },
        data() {
            return {
                forms: {
                    one: {
                        title: 'Teaching materials',
                        headers: [
                            {text: 'Code-Corse title', value: 'one_title'},
                            {text: 'Number of credits', value: 'one_number'},
                            {text: 'Language', value: 'one_language'},
                            {text: 'Date of completion', value: 'one_date'},
                            {text: 'Execution', value: 'one_execution'},
                        ],
                        values: {},
                    },
                    two: {
                        title: 'Textbook/Methodological guidelines',
                        headers: [
                            {text: 'Type of Textbook', value: 'two_type'},
                            {text: 'Textbook title', value: 'two_size'},
                            {text: 'Book size (mb)', value: 'two_deadline'},
                            {text: 'Deadline', value: 'two_deadline'},
                            {text: 'Co-author', value: 'two_coauthor'},
                            {text: 'Place of publishing', value: 'two_publishing'},
                            {text: 'Execution', value: 'two_execution'},
                        ],
                        values: {},
                    },
                    three: {
                        title: 'Program of academic mobility',
                        headers: [
                            {text: 'Type of academic exchange', value: 'three_type',},
                            {text: 'Aim', value: 'three_aim'},
                            {text: 'Period', value: 'three_period'},
                            {text: 'Execution', value: 'three_execution'},
                        ],
                        values: {},
                    },
                    four:{
                        title: 'Demo lessons',
                        headers: [
                            {text: 'Course title', value: 'four_title'},
                            {text: 'Type of classes', value: 'four_type'},
                            {text: 'Topic of the classes', value: 'four_topic'},
                            {text: 'Major/Academic Group', value: 'four_group'},
                            {text: 'Date of completion', value: 'four_date'},
                            {text: 'Execution', value: 'four_execution'},
                        ],
                        values: {},
                    },
                    five: {
                        title: 'Interactive co-attending lessons',
                        headers: [
                            {text: 'Lecturer/instructor\'s name', value: 'five_name'},
                            {text: 'Course title', value: 'five_title'},
                            {text: 'Topic of the classes', value: 'five_topic'},
                            {text: 'Date of completion', value: 'five_date'},
                            {text: 'Assessment', value: 'five_assessment'},
                            {text: 'Execution', value: 'five_execution'},
                        ],
                        values: {},
                    },
                },
            }
        },
        methods: {
            submit() {
                let data = {
                    ...this.forms.one.values,
                    ...this.forms.two.values,
                    ...this.forms.three.values,
                    ...this.forms.four.values,
                    ...this.forms.five.values,
                };
                axios.put('/api/educations/' + this.reportId, data).then(response => {
                    if (response.data.success) {
                        this.$router.push({name: 'report-show', params: { reportId: this.reportId }});
                    }
                });
            }
        }
    }
</script>
