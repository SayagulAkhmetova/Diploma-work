<template>
        <div>
                <v-text-field
                        v-model="search"
                        label="Type to find a document"
                        outlined
                        dense
                        hide-details
                        append-outer-icon="mdi-file-search"
                        @click:append-outer="submit"
                ></v-text-field>
        </div>
</template>

<script>

    export default {
            data() {
                    return {
                            search: '',
                    }
                },

            methods: {
                    submit() {
                            if (this.$route.query.query === this.search) {
                                    console.log('note made: make a new query');
                            } else {
                                    this.$router.push('/advanced-search?query=' + this.search);
                            }
                    },
            },



    }
</script>
