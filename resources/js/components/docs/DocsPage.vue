<template>
    <v-container>

        <v-row>
            <v-col>
                <v-btn
                        large color="blue"
                        dark
                        :to="{ name: 'all-docs' }"
                >My documents</v-btn>
                <v-btn
                        large
                        color="blue"
                        dark
                        :to="{ name: 'new-doc' }"
                >Add new</v-btn>
            </v-col>
        </v-row>

        <router-view></router-view>

    </v-container>
</template>

