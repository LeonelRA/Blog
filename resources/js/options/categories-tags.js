
const edit = (name, id, slug, component) => {          

    if(document.getElementById(`button-${id}`).innerText == 'Update'){
        update(slug, id, component)
    }


    const comment = document.getElementById(`component-${id}`);

    if (!document.getElementById('edit')) {

        comment.innerHTML = '';

        const textarea = document.createElement('textarea');

        textarea.className = 'form-control';
        textarea.id = 'edit'
        textarea.innerText = name;

        comment.appendChild(textarea);

        document.getElementById(`button-${id}`).innerText = 'Update'

        document.getElementById(`button-${id}`).classList.remove("edit");

        //---------------------------------------------------

        const btnEdit = document.querySelectorAll('button.edit')
        const btnDelete = document.querySelectorAll('button.delete')

        for (var i = btnEdit.length - 1; i >= 0; i--) {
            btnEdit[i].setAttribute('disabled', '')
        }

        for (var i = btnDelete.length - 1; i >= 0; i--) {
            btnDelete[i].setAttribute('disabled', '')
        }

    }

}

const update = (slug, id, component) => {

    axios.put(`/admin/${component}/${slug}`,{
        name: document.getElementById('edit').value
    }).then(response => {
        if(response.data.validate){

            let comment = document.getElementById(`component-${id}`);

            comment.removeChild(document.getElementById('edit'));

            comment.innerText = response.data.name;

            document.getElementById(`button-${id}`).innerText = 'Edit'

            //----------------------------------------------

            const btnEdit = document.querySelectorAll('button.edit')
            const btnDelete = document.querySelectorAll('button.delete')

            for (var i = btnEdit.length - 1; i >= 0; i--) {
                btnEdit[i].removeAttribute('disabled')
            }

            for (var i = btnDelete.length - 1; i >= 0; i--) {
                btnDelete[i].removeAttribute('disabled')
            }

        }

    });

};

const deleteComponent = (slug, component) => {
    axios.delete(`/admin/${component}/${slug}`)
        .then(response => {
            if(response.data.validate){
                location.reload();
            }
        });
}

export { edit, update, deleteComponent}











