<template>
    <div style="padding-bottom: 250px;">
        <v-row>
            <v-col>

                <h1 class="display-2 text-center mt-4 mb-8">II-Research work</h1>
                <v-card v-for="form in forms" class="grey lighten-3 mb-8">
                    <v-card-title>{{form.title}}</v-card-title>

                    <v-card-text>
                        <v-form ref="form">

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
            axios.get('/api/researches/' + this.reportId).then(response => {
                this.forms.one.values = { ...response.data.data.one.one };
                this.forms.two.values = { ...response.data.data.two };
                this.forms.three.values = { ...response.data.data.three };
                this.forms.four.values = { ...response.data.data.four };
                this.forms.five.values = { ...response.data.data.five };
                this.forms.six.values = { ...response.data.data.six };
                this.forms.seven.values = { ...response.data.data.seven };
                this.forms.eight.values = { ...response.data.data.eight.one };
            });


        },
        data() {
            return {
                // формы которые должны быть в петле
                forms: {
                    one: {
                        title: 'Publications, articles',
                        headers: [
                            {text: 'Title', value: 'one_one_title'},
                            {text: 'Type of publication', value: 'one_one_type'},
                            {text: 'Language', value: 'one_one_language'},
                            {text: 'Issue data (journal, country, city, year, page) or media title', value: 'one_one_data'},
                            {text: 'Date of completion', value: 'one_one_date'},
                            {text: 'Execution', value: 'one_one_execution'},
                        ],
                        values: [],
                    },
                    two: {
                        title: 'Right-protective documentation (patent,pre-patent,innovational patent, copyright certificate,intellectual property certificate)',
                        headers: [
                            {text: 'Type', value: 'two_type'},
                            {text: 'Title', value: 'two_title'},
                            {text: 'No of certificate', value: 'two_number'},
                            {text: 'No of certificate', value: 'two_coauthor'},
                            {text: 'MERZIM', value: 'two_date'},
                            {text: 'Execution', value: 'two_execution'},
                        ],
                        values: [],
                    },
                    three: {
                        title: 'Monography',
                        headers: [
                            {text: 'Title', value: 'three_title',},
                            {text: 'Country/ City', value: 'three_language'},
                            {text: 'Title', value: 'three_data'},
                            {text: 'Date of completion', value: 'three_date'},
                            {text: 'Execution', value: 'three_execution'},
                        ],
                        values: [],
                    },
                    four: {
                        title: 'Joint research with RK and international universities,establishments',
                        headers: [
                            {text: 'International university', value: 'four_university'},
                            {text: 'Country/ City', value: 'four_country'},
                            {text: 'Title', value: 'four_title'},
                            {text: 'Date of completion', value: 'four_date'},
                            {text: 'Execution', value: 'four_execution'},
                        ],
                        values: [],
                    },
                    five: {
                        title: 'RK and international research projects',
                        headers: [
                            {text: 'Basic direction of scientific work', value: 'five_direction'},
                            {text: 'The title of research work', value: 'five_title'},
                            {text: 'Position in the project', value: 'five_position'},
                            {text: 'Type of funding', value: 'five_funding'},
                            {text: 'Project budget', value: 'five_budget'},
                            {text: 'Date/Period of completion', value: 'five_date'},
                            {text: 'Execution', value: 'five_execution'},
                        ],
                        values: [],
                    },
                    six: {
                        title: 'Research work with student, undergraduates and doctoral students (within HEI, university wide, national, international level)',
                        headers: [
                            {text: 'Student name', value: 'six_name'},
                            {text: 'Speciality/Program course', value: 'six_course'},
                            {text: 'Type of work', value: 'six_type'},
                            {text: 'Date/Period of completion', value: 'six_date'},
                            {text: 'Project budget City, university', value: 'six_city'},
                            {text: 'Result', value: 'six_result'},
                            {text: 'Execution', value: 'six_execution'},
                        ],
                        values: [],
                    },
                    seven: {
                        title: 'List of defended and approved PhD-dissertation/thesis under scientific supervision of academic staff',
                        headers: [
                            {text: 'Name of PhD student', value: 'seven_name'},
                            {text: 'Date of defense', value: 'seven_date'},
                            {text: 'Place of defense', value: 'seven_place'},
                            {text: 'Execution', value: 'seven_execution'},
                        ],
                        values: [],
                    },
                    eight: {
                        title: 'Acts of implementation of research results into academic process',
                        headers: [
                            {text: 'Title, speciality', value: 'eight_one_title'},
                            {text: 'Place of implementation', value: 'eight_one_place'},
                            {text: 'Form of implementation', value: 'eight_one_form'},
                            {text: 'Execution', value: 'eight_one_execution'},
                        ],
                        values: [],
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
                    ...this.forms.six.values,
                    ...this.forms.seven.values,
                    ...this.forms.eight.values,
                };
                axios.put('/api/researches/' + this.reportId, data).then(response => {
                    if (response.data.success) {
                        this.$router.push({name: 'report-show', params: { reportId: this.reportId }});
                    }
                });
            }
        }
    }
</script>
