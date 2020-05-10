<template>
    <div style="padding-bottom: 250px;">
        <v-row>
            <v-col>

                <h1 class="display-2 text-center mt-4 mb-8">IV-Social work and Service</h1>
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
            axios.get('/api/socials/' + this.reportId).then(response => {
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
                        title: 'Within university',
                        headers: [
                            {text: 'Type of work', value: 'one_type'},
                            {text: 'Position', value: 'one_position'},
                            {text: 'Execution', value: 'one_execution'},
                        ],
                        values: [],
                    },
                    two: {
                        title: 'In other cases',
                        headers: [
                            {text: 'Type of work', value: 'two_type'},
                            {text: 'Position', value: 'two_position'},
                            {text: 'Execution', value: 'two_execution'},
                        ],
                        values: [],
                    },
                    three: {
                        title: 'Reviews for other institutions',
                        headers: [
                            {text: 'Title', value: 'three_title',},
                            {text: 'Author', value: 'three_author'},
                            {text: 'Author', value: 'three_institution'},
                            {text: 'Execution', value: 'three_execution'},
                        ],
                        values: [],
                    },
                    four: {
                        title: 'Achievements and awards',
                        headers: [
                            {text: 'Type of work', value: 'four_type'},
                            {text: 'Result', value: 'four_result'},
                            {text: 'Place, date', value: 'four_place'},
                        ],
                        values: [],
                    },
                    five: {
                        title: 'In other cases',
                        headers: [
                            {text: 'Type of work', value: 'five_type'},
                            {text: 'Result', value: 'five_result'},
                            {text: 'Place, date', value: 'five_place'},
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
                };
                axios.put('/api/socials/' + this.reportId, data).then(response => {
                    if (response.data.success) {
                        this.$router.push({name: 'report-show', params: { reportId: this.reportId }});
                    }
                });
            }
        }
    }
</script>
