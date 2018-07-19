<template>
    <div>
        <v-btn @click="criarUsuario" color="accent" dark class="mb-2">Novo Usuario</v-btn>
        <v-dialog v-model="dialog.show" max-width="500px">
            <v-card>
                <v-card-title>
                    <span class="headline">{{ dialog.title }}</span>
                </v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12 sm6 md6>
                                <v-text-field v-model="dialog.usuario.email"
                                              label="Email"
                                              name="email"
                                              @keyup.enter="salvar"
                                              v-validate="'required|email'"
                                              :error-messages="errors.first('email') ? errors.first('email') : []"
                                />
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-text-field v-model="dialog.usuario.senha"
                                              label="Senha"
                                              name="senha"
                                              type="password"
                                              @keyup.enter="salvar"
                                              v-validate="'required|min:3'"
                                              :error-messages="errors.first('senha') ? errors.first('senha') : []"
                                />
                            </v-flex>
                            <v-flex xs12 sm6 md6 v-for="(permissao, key) in permissoes" :key="key">
                                <v-switch :label="permissao.nome" :value="dialog.usuario.permissoes.find((id) => permissao.id === id)" @change="tooglePermissao(permissao.id)">

                                </v-switch>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="gray" flat @click.native="dialog.show = false">Voltar</v-btn>
                    <v-btn color="accent " :loading="dialog.loading" :disabled="dialog.loading" @click="salvar">Salvar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-data-table
                :headers="headers"
                :items="usuarios"
                hide-actions
        >
            <template slot="items" slot-scope="props">
                <td class="text-xs-left"> {{ props.item.email}}</td>
                <td class="text-xs-right">
                    <v-btn icon class="mx-0" @click="editarUsuario(props.item)">
                        <v-icon color="dark">edit</v-icon>
                    </v-btn>
                    <v-btn icon class="mx-0" :disabled="loading" @click="removerUsuario(props.item)">
                        <v-icon color="red">delete</v-icon>
                    </v-btn>
                </td>
            </template>
        </v-data-table>
    </div>
</template>

<script>
    import axios from 'axios'
    import {URL_ADMIN} from "../../config";
    import ResponseError from '@/classes/ResponseError'

    export default {
        name: 'Usuarios',
        computed: {
            headers () {
                let headers = [
                    {text: 'Email', value: 'email'}
                ];
                headers.push({text: 'Ações', sortable: false, align: 'right'});

                return headers
            }
        },
        methods: {
            tooglePermissao(id){
                let index = this.dialog.usuario.permissoes.indexOf(id);
                if(index === -1){
                    this.dialog.usuario.permissoes.push(id);
                }else{
                    this.dialog.usuario.permissoes.splice(index, 1);
                }
            },
            criarUsuario () {
                this.dialog.show = true;
                this.dialog.title = 'Novo Usuario';
                this.dialog.usuario = {
                    id: 0,
                    email: '',
                    senha: '',
                    permissoes: []
                }
            },
            editarUsuario (usuario) {
                this.dialog.show = true;
                this.dialog.title = 'Editar Usuario';
                this.dialog.usuario = usuario;
            },
            salvar () {
                this.dialog.loading = true;
                this.$validator.validateAll()
                    .then((result) => {
                        if (!result) {
                            throw new Error()
                        }
                        if(this.dialog.usuario.id === 0){
                            return axios.post(URL_ADMIN + 'usuario', this.dialog.usuario);
                        }else{
                            return axios.put(URL_ADMIN + 'usuario/' + this.dialog.usuario.id, this.dialog.usuario);
                        }

                    })
                    .then((response) => {
                        this.dialog.show = false;
                        if(this.dialog.usuario.id === 0){
                            this.usuarios.push(response.data.data)
                        }else{
                            let index = this.usuarios.indexOf(this.dialog.usuario);
                            this.usuarios.splice(index, 1, response.data.data);
                        }
                    })
                    .catch((error) => {
                        error = new ResponseError(error);
                        if (error.getCode() !== 400) {
                            return
                        }

                        if (error.hasInput('email')) {
                            this.$validator.errors.add('email', error.getMessageFromInput('email'))
                        }

                        if (error.hasInput('senha')) {
                            this.$validator.errors.add('senha', error.getMessageFromInput('senha'))
                        }
                    })
                    .finally(() => {
                        this.dialog.loading = false
                    })
            },
            removerUsuario (usuario) {
                this.loading = true;
                axios.delete(URL_ADMIN + 'usuario/' + usuario.id).finally(() => { this.loading = false });
                let index = this.usuarios.indexOf(this.dialog.usuario);
                this.usuarios.splice(index, 1);
            }
        },
        data () {
            return {
                loading: false,
                permissoes: [],
                usuarios: [],
                dialog: {
                    show: false,
                    loading: false,
                    title: 'Novo Usuario',
                    usuario: {
                        id: 0,
                        email: '',
                        senha: '',
                        permissoes: []
                    }
                }
            }
        },
        created () {
            axios.get(URL_ADMIN + 'permissoes').then((response) => {
                this.permissoes = response.data.data;
            });

            axios.get(URL_ADMIN + 'usuario?limit=0').then((response) => {
                this.usuarios = response.data.data;
            });
        }
    }
</script>

<style scoped>

</style>
