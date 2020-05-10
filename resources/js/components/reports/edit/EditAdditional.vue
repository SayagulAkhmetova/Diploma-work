<template>
    <div style="padding-bottom: 250px;">
        <v-row>
            <v-col>

                <h1 class="display-2 text-center mt-4 mb-8">III-Additional activities</h1>
                <v-card v-for="form in forms" class="grey lighten-3 mb-8">
                    <v-card-title>{{form.title}}</v-card-title>

                    <v-card-text>
                        <v-form ref="form">

                            <v-row>
                                <v-col v-for="field in form.headers">

                                    <!--case: not select field-->
                                    <template v-if="!field.value.includes('execution')">
                                        <v-text-field
                                                v-model="form.values[field.value]"
                                                :label="field.text"
                                        ></v-text-field>
                                    </template>

                                    <!--case: select filed-->
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
            axios.get('/api/additionls/' + this.reportId).then(response => {
                this.forms.one.values = { ...response.data.data.one };
                this.forms.two.values = { ...response.data.data.two };
                this.forms.three.values = { ...response.data.data.three };
            });


        },
        data() {
            return {

                forms: {
                    one: {
                        title: 'At University',
                        headers: [
                            {text: 'Type', value: 'one_type'},
                            {text: 'Country', value: 'one_country'},
                            {text: 'Title of event', value: 'one_event'},
                            {text: 'Position', value: 'one_position'},
                            {text: 'Date of issue, place', value: 'one_date'},
                            {text: 'Execution', value: 'one_execution'},
                        ],
                        values: [],
                    },
                    two: {
                        title: 'In other cases',
                        headers: [
                            {text: 'Type', value: 'two_type'},
                            {text: 'Country', value: 'two_country'},
                            {text: 'Title of event', value: 'two_event'},
                            {text: 'Position', value: 'two_position'},
                            {text: 'Date of issue, place', value: 'two_date'},
                            {text: 'Execution', value: 'two_execution'},
                        ],
                        values: [],
                    },
                    three: {
                        title: 'List of business trips',
                        headers: [
                            {text: 'Type of business trip', value: 'three_type'},
                            {text: 'Place and Date of business trip', value: 'three_place'},
                            {text: 'Aim of business trip', value: 'three_aim'},
                            {text: 'Type of funding', value: 'three_funding'},
                            {text: 'Execution', value: 'three_execution'},
                        ],
                        values: [],
                    }
                },
            }
        },
        methods: {
            submit() {
                let data = {
                    ...this.forms.one.values,
                    ...this.forms.two.values,
                    ...this.forms.three.values,
                };
                axios.put('/api/additionls/' + this.reportId, data).then(response => {
                    if (response.data.success) {
                        this.$router.push({name: 'report-show', params: { reportId: this.reportId }});
                    }
                });
            }
        }
    }
</script>
