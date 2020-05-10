<template>
    <v-app id="keep">
        <v-app-bar
                app
                clipped-left
                color="blue lighten-4"

        >
            <v-btn text :to="{name: 'all-reports'}">
                <span class="title ml-3 mr-5">SDU&nbsp;<span class="font-weight-light">Teacher works</span></span>
            </v-btn>
            <v-app-bar-nav-icon class="mx-6" @click="drawer = !drawer" />

            <v-row>
                <search-form></search-form>
            </v-row>

            <v-spacer />

            <v-switch
                    v-model="goDark"
                    color="secondary"
            ></v-switch>


            <div class="text-center">
                <v-menu
                        :close-on-content-click="false"
                        :nudge-width="200"
                        offset-x
                >
                    <template v-slot:activator="{ on }">
                        <v-btn
                                color="indigo"
                                dark
                                v-on="on"
                        >
                            Settings
                        </v-btn>
                    </template>

                    <v-card>
                        <v-list>
                            <v-list-item>
                                <v-list-item-avatar>
                                    <img src="https://media-exp1.licdn.com/dms/image/C4D0BAQHm1C4ZtQU_DA/company-logo_200_200/0?e=2159024400&v=beta&t=-8zEGI8UpXGX9cvlUUkuttb_rFmg09kjeJ0bZcYvhIs" alt="John">
                                </v-list-item-avatar>

                                <v-list-item-content>
                                    <v-list-item-title v-text="user.name"></v-list-item-title>
                                    <v-list-item-subtitle v-text="user.department"></v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list>

                        <v-divider></v-divider>

                        <v-card-actions>
                            <v-btn color="info" @click="logout">Logout</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-menu>
            </div>


        </v-app-bar>

        <v-navigation-drawer
                v-model="drawer"
                app
                clipped
                color="grey lighten-4"
        >
            <v-list
                    dense
                    class="grey lighten-4"
            >
                <template v-for="(item, i) in items">
                    <v-divider
                            v-if="item.divider"
                            :key="i"
                            dark
                            class="my-4"
                    />
                    <v-list-item
                            v-else
                            :key="i"
                            :to="item.url"
                    >
                        <v-list-item-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="grey--text">
                                {{ item.text }}
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </template>
            </v-list>
        </v-navigation-drawer>

        <v-content>
            <v-scroll-y-reverse-transition hide-on-leave>
                <router-view></router-view>
            </v-scroll-y-reverse-transition>

            <!--footer todo make visable-->
            <div>
                            <v-footer
                                    style="margin-top: 400px"
                                    clipped-left
                                    dark
                                    padless
                            >
                                <v-card
                                        flat
                                        tile
                                        class="indigo lighten-1 white--text text-center"
                                >
                                    <v-card-text>
                                        <v-btn
                                                v-for="icon in icons"
                                                :key="icon"
                                                class="mx-4 white--text"
                                                icon
                                        >
                                            <v-icon size="24px">{{ icon }}</v-icon>
                                        </v-btn>
                                    </v-card-text>

                                    <v-card-text class="white--text">
                                        SDU is committed to developing, through outstanding knowledge creation and delivery, graduates who are global citizens and whose values are formed through holistic education. These skilled professionals and disseminators of knowledge and innovation will enhance the lives of fellow citizens, the economy, and the nation.
                                    </v-card-text>

                                    <v-divider></v-divider>

                                    <v-card-text class="white--text">
                                        {{ new Date().getFullYear() }} — <strong>SDU</strong>
                                    </v-card-text>
                                </v-card>
                        </v-footer>
            </div>
        </v-content>
    </v-app>
</template>

<script>
    import SearchForm from './components/SearchForm';

    export default {
        props: {
            source: String,
        },
        components: {
            SearchForm
        },
        created() {
            this.user = JSON.parse(localStorage.user);
        },
        mounted() {
            this.$vuetify.theme.dark = false;
        },
        data: () => ({

            // footer
            icons: [ // footer
                'mdi-facebook',
                'mdi-twitter',
                'mdi-linkedin',
                'mdi-instagram',
            ],

            user: null,

            // theme switcher
            goDark: false,


            // side menu
            drawer: null,
            items: [
                { icon: 'mdi-lightbulb', text: 'Dashboard', url: '/reports'},
                { icon: 'mdi-lightbulb', text: 'Profile', url: '/profile'},
                { icon: 'mdi-lightbulb', text: 'Bookmarks', url: '/bookmarks'},
                { icon: 'mdi-file-find-outline', text: 'Advanced Search', url: '/advanced-search'},
                { icon: 'mdi-archive', text: 'Rating', url: '/analytics'},
                // { icon: 'mdi-delete', text: 'Settings', url: '/settings'},
                { divider: true },
                { icon: 'mdi-lightbulb', text: 'My documents', url: '/docs/'},
            ],
        }),
        methods: {
            logout() {
                axios.post('/logout').then(response => {
                    localStorage.removeItem('userId');
                    localStorage.removeItem('user');
                    window.location.href = '/login';

                });
            }
        },
        watch: {
            goDark() {
                this.$vuetify.theme.dark = this.goDark;
            }
        }

    }
</script>

<style>
    #keep .v-navigation-drawer__border {
        display: none
    }
</style>
