import store from '~/store'

export default (to, from, next) => {
  if (store.getters['auth/user'].role !== 'admin') {
    console.log('entro aqui');
    next({ name: 'sinPermisos' })
  } else {
    next()
  }
}
