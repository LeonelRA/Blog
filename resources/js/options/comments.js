import { ref } from "vue"

const editing = ref(false);
const editId = ref();

const reply = (name, id) => {
	document.getElementById('reply').value = id;
	document.getElementById('commentLabel').innerText = 'Reply to : ' + name;
}

const edit = (text, id) => {          

    const comment = document.getElementById(`comment-${id}`);

    const p = comment.getElementsByTagName('p')[0];

    if (!document.getElementById('edit')) {
        comment.removeChild(p);

        const textarea = document.createElement('textarea');

        textarea.className = 'form-control mb-2';
        textarea.id = 'edit'
        textarea.innerText = text;

        comment.appendChild(textarea);

        editId.value = id; 

        editing.value = true;

    }
}

const update = (id) => {

    axios.put(`/comment/${id}`,{
        text: document.getElementById('edit').value
    }).then(response => {
        if(response.data.comment){

            let comment = document.getElementById(`comment-${id}`);

            comment.removeChild(document.getElementById('edit'));

            let p = document.createElement('p');
            comment.appendChild(p)

            p.innerText = response.data.text;

            editId.value = 0;

            editing.value = false;
        }
    });

};

const deleteComment = (id) => {
    axios.delete(`/comment/${id}`)
        .then(response => {
            const parent = document.getElementById(`comment-${id}`).parentNode.parentNode.parentNode;
            const child = document.getElementById(`comment-${id}`).parentNode.parentNode;

            parent.removeChild(child);
        });
}

export { editing, editId, reply, edit, update, deleteComment }











