<template>
	<form>
	    <div class="form-group" id="comment">
	        <label for="comment" id="commentLabel">Your comment</label>
	        <input type="hidden" name="reply" id="reply">
	        <textarea name="text" class="form-control" id="comment" rows="6" v-model="comment"></textarea>
	    </div>
	    <button @click.prevent="test" class="btn btn-primary btn-block mb-5">
	        Comment
	    </button>
	</form>
</template>

<script>
    import { ref, computed } from "vue"

    export default {
    	props:{
    		user: {
    			type: Number,
    			required: true
    		},
    		post: {
    			type: Number,
    			required: true
    		}    		
    	},
    	setup(props){
    		const comment = ref('');

    		const test = computed(() => {
    			if (props.user > 0) {

    				axios.post('/comment', {
    					post: props.post,
    					text: comment.value,
    					reply: parseInt(document.getElementById('reply').value)
    				}).then(response => {
    					location.reload();
    				});
    			}
    		})

    		return {
    			comment,
    			test
    		}
    	}
    }
</script>