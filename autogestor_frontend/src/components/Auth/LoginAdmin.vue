<template>
    <v-app>
        <v-content>
            <v-container fluid fill-height class="base-page-login">
                <v-layout align-center justify-center>
                    <v-flex xs12 sm8 md5 lg3>
                        <v-card class="elevation-12 card-login" center>
                            <v-card-text>
                                <v-form data-vv-scope="login" v-on:submit.prevent="login">
                                    <v-text-field prepend-icon="person"
                                                  id="email"
                                                  name="email"
                                                  label="Email"
                                                  v-model="loginForm.email"
                                                  v-validate="'required|email'"
                                                  @keyup.enter="login"
                                                  :error-messages="errors.first('login.email')?errors.first('login.email'):[]"
                                                  type="email">
                                    </v-text-field>
                                    <v-text-field prepend-icon="lock"
                                                  id="senha"
                                                  name="senha"
                                                  label="Senha"
                                                  v-model="loginForm.senha"
                                                  v-validate="'required|min:6'"
                                                  @keyup.enter="login"
                                                  :error-messages="errors.first('login.senha')?errors.first('login.senha'):[]"
                                                  type="password">
                                    </v-text-field>
                                </v-form>
                            </v-card-text>
                            <v-card-actions>
                                <v-btn color="grey darken-1" flat small @click="senhaDialog = true">
                                    Esqueci a senha
                                </v-btn>
                                <v-spacer></v-spacer>
                                <v-btn color="accent"
                                       @click="login"
                                       :loading="loginForm.loading"
                                       @click.native="loader = 'loginForm.loading'"
                                       :disabled="loginForm.loading">
                                    Login
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
    import axios from 'axios';
    import {NAME_TOKEN, URL_ADMIN} from '@/config'
    import ResponseError from '@/classes/ResponseError'

    export default {
        name: "LoginAdmin",
        data() {
            return {
                loginForm: {
                    email: '',
                    senha: '',
                    loading: false
                },
            }
        },
        methods: {
            login: function () {
                this.loginForm.loading = true;
                this.errors.clear();
                this.$validator.validateAll('login').then((result) => {
                    if (!result) {
                        this.loginForm.loading = false;
                        return false
                    }
                    this.sendLogin(this.loginForm.email, this.loginForm.senha).then(() => {
                        if (localStorage.get('nextUrl')) {
                            this.$router.push(localStorage.get('nextUrl'));
                            return
                        }
                        this.$router.push({name: 'dashboard'})
                    }).catch((error) => {
                        if (error.getCode() !== 400) {
                            return
                        }

                        if (error.hasInput('email')) {
                            this.$validator.errors.add('login.email', error.getMessageFromInput('email'))
                        }

                        if (error.hasInput('senha')) {
                            this.$validator.errors.add('login.senha', error.getMessageFromInput('senha'))
                        }
                    }).finally(() => {
                        this.loginForm.loading = false
                    })
                })
            },
            sendLogin(email, senha){
                // Usaria Vuex aqui
                return new Promise((resolve, reject) => {
                    axios.post(URL_ADMIN + 'login', {email, senha})
                        .then((response) => {
                            localStorage.setItem(NAME_TOKEN, response.data.token);
                            localStorage.setItem('isMaster', "1");
                        })
                        .catch((error) => {
                            reject(new ResponseError(error.response.data.data, error.response.status))
                        });
                })
            }
        }
    }
</script>

<style scoped>

</style>
