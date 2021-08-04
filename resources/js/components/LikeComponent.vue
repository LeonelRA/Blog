<template>

    <span>{{ `Likes : ${likes}` }}</span>

    <button class="bg-transparent border-0" @click="test">
        
        <div v-show="!like">
            <i class="far fa-heart"></i>
        </div>

        <div v-show="like">
            <i class="fas fa-heart"></i>
        </div>

    </button>

</template>

<script>
    import { ref, computed } from "vue"

    export default {
        props: {
          like :{
            type: [Boolean, Object], 
            required: true,
          },
          post: {
            type: Number,
            required: true
          },
          user: {
            type: Number,
            required: false,
          },
          likes: {
            type: Number,
            required: true
          }
        },
        setup(props) {
            const like = ref(props.like);
            const likes = ref(props.likes);

            const test = computed(() => {
                if (like.value) {

                    axios.delete(`/like/${like.value.id}`)
                        .then(response => {
                            likes.value--;
                            like.value = response.data.like;
                        })

                }else {
                    if(props.user > 0){
                        axios.post('/like', {
                            user: props.user,
                            post: props.post
                        }).then( response => {
                            likes.value++;
                            like.value = response.data.like;
                        })
                    }
                }
            })

            return {
                like,
                likes,
                test

            }
        }
    }
</script>
