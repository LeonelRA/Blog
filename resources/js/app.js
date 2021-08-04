/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import { createApp } from 'vue';

import LikeComponent from  './components/LikeComponent'
import CommentComponent from  './components/CommentComponent'
import OptionCommentComponent from  './components/OptionCommentComponent'
import OptionCategoriesTagsComponent from  './components/OptionCategoriesTagsComponent'

createApp({
    components: {
        LikeComponent,
        CommentComponent,
        OptionCommentComponent,
        OptionCategoriesTagsComponent
    }
}).mount('#app');
