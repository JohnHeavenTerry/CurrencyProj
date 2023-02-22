<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<div id="app">
    <form></form>
</div>

Vue.component('form', require('./components/form.vue').default);

