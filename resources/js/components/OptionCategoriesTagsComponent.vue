<template>

	<div>
        <button @click="edit(component.name, component.id, component.slug, type)" class="btn btn-warning mx-1 edit" :id="`button-${component.id}`">
            Edit
        </button>

     	<button @click="deleteComponent(component.slug, type)" class="btn btn-danger delete">
            Delete
        </button> 
	</div>

</template>

<script>

    import { edit, update, deleteComponent } from "../options/categories-tags.js"
    import {ref} from 'vue'

    export default {
    	props:{
            component: {
                type: Object,
                required: true
            },
            type: {
                type: String,
                required: true
            }               		
    	},
    	setup(props){

    		return {
    			edit,
                update,
                deleteComponent
    		}
    	}
    }
</script>