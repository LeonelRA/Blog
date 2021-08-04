<template>

	<div>
     	<a href="#comment" @click="reply(comment.user.username,comment.id)" class="btn btn-primary" :class="{'disabled': editing}">
            Reply
        </a>

        <button @click="!editing ? edit(comment.text, comment.id) : update(comment.id)" class="btn btn-warning mx-1" v-show="user" :disabled="editId !== comment.id && editing">
            {{ editId == comment.id ? 'Update' : 'Edit' }}
        </button>

     	<button @click="deleteComment(comment.id)" class="btn btn-danger" v-show="user" :disabled="editing">
            Delete
        </button> 
	</div>

</template>

<script>
    import { editing, editId, reply, edit, update, deleteComment } from "../options/comments.js"

    export default {
    	props:{
    		user: {
    			type: Boolean,
    			required: true
    		},
    		comment: {
    			type: Object,
    			required: true
    		}    		
    	},
    	setup(){

    		return {
                editing,
                editId,
    			reply,
    			edit,
                update,
    			deleteComment
    		}
    	}
    }
</script>