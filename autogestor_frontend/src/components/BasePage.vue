<template>
    <v-app id="inspire">
        <v-navigation-drawer fixed v-model="drawer" app>
            <v-list dense>
                <v-list-tile @click="routePush(menu.route)" v-for="(menu, key) in menus" :key="key"
                             :color="getColorByRoute(menu.route)" v-if="(isAdmin && menu.master) || (!isAdmin && !menu.master && hasPermissao(menu.id))">
                    <v-list-tile-action>
                        <v-icon :color="getColorByRoute(menu.route)">{{menu.icon}}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>{{menu.label}}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar color="primary" dark fixed app>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title>{{pageName()}}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-menu offset-y left transition="slide-x-transition">
                <v-btn slot="activator" flat icon>
                    <v-icon>settings</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile @click="logout()">
                        <v-list-tile-action>
                            <v-icon>exit_to_app</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-title>
                            Sair
                        </v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-toolbar>
        <v-content>
            <v-container fluid fill-height>
                <v-layout row wrap>
                    <v-flex md12 sm12>
                        <transition>
                            <router-view/>
                        </transition>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
    import {NAME_TOKEN} from "../config";
    export default {
        name: 'BasePage',
        data () {
            return {
                drawer: false,
                menus: [
                    {
                        icon: 'people',
                        label: 'Usuarios',
                        route: 'admin-usuarios',
                        master: true
                    },
                    {
                        id: 1,
                        icon: 'list',
                        label: 'Produtos',
                        route: 'produtos',
                        master: false
                    },
                    {
                        id: 2,
                        icon: 'group_work',
                        label: 'Categorias',
                        route: 'categorias',
                        master: false
                    },
                    {
                        id: 3,
                        icon: 'people',
                        label: 'Marcas',
                        route: 'marcas',
                        master: false
                    }
                ]
            }
        },
        computed: {
          isAdmin() {
              return localStorage.getItem('isMaster') === '1';
          }
        },
        methods: {
            hasPermissao(id){
              let permissoes = localStorage.getItem('permissoes');
              return !!permissoes.split(',').find((item) => item == id)
            },
            routePush (route) {
                this.$router.push({name: route})
            },
            pageName () {
                return this.$router.currentRoute.name.toUpperCase().replaceAll('-', ' ')
            },
            getColorByRoute (name) {
                return this.$router.currentRoute.name === name ? 'dark' : 'gray'
            },
            logout () {
                localStorage.removeItem(NAME_TOKEN);
                this.$router.push({name: 'login'})
            }
        },
        mounted () {
            this.drawer = this.$vuetify.breakpoint.name === 'xl' || this.$vuetify.breakpoint.name === 'lg'
        }
    }
</script>

<style scoped>
    .logo {
        height: 300px;
        width: 100%;
        display: block !important;
        padding-left: 6%;
    }

    .logo img {
        height: 255px;

    }
</style>
