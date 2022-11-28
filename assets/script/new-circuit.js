window.addEventListener("load", (event) => {
    const l_select = document.querySelector('select[name="circuit_theme"]');
    const l_files = document.querySelectorAll('input[type="file"]');
    const l_medias_img = document.querySelectorAll('.medias img.question_img');
    const l_remove_images = document.querySelectorAll('.remove');
    const l_questions = document.querySelectorAll('.question') ;

    l_select.addEventListener('change', (event) => {
        const l_other_themes = document.querySelector('input[name="other_theme"]');
        l_other_themes.removeAttribute('disabled');
        l_other_themes.setAttribute('required','');
        if (l_select.value != 5 ){
            l_other_themes.setAttribute('disabled','');
            l_other_themes.removeAttribute('required');
        }
    });

    l_files.forEach(l_file => {
        l_file.addEventListener('change', (event) => {
            const l_image_limit = document.querySelector('#image_limit').value;
            if (event.currentTarget.files.length > l_image_limit){
                alert(event.currentTarget.files.length);
                event.currentTarget.value='';
            }
            let l_image_in_files = event.currentTarget.files.length;
            let l_question_number = event.currentTarget.parentNode.childNodes[3].value;
            let l_base_number = parseInt(l_question_number)*(l_image_limit*2);
            let l_first_limit = parseInt(l_question_number)*(l_image_limit*2)+(l_image_in_files*2);
            let l_last_limit = (1+parseInt(l_question_number))*(l_image_limit*2);
            display_miniatures(l_base_number,l_first_limit,l_last_limit,event.currentTarget.files);
        });
    });

    l_remove_images.forEach( l_remove_img => {
        l_remove_img.addEventListener('click', (event) => {
            const l_image_limit = document.querySelector('#image_limit').value;
            let l_file_store = event.currentTarget.parentNode.parentNode.childNodes[5];
            const l_index_file = event.currentTarget.parentNode.childNodes[7].value;
            let l_new_file_store = [];
            let l_image_in_files = l_file_store.files.length;
            let l_question_number = event.currentTarget.parentNode.parentNode.childNodes[3].value;
            let l_data_transfer = new DataTransfer();
            for (let i = 0; i < l_image_in_files; ++i){
                l_new_file_store[i] = l_file_store.files[i];
            }
            l_new_file_store.splice(l_index_file,1);
            for (let i = 0; i < l_new_file_store.length; ++i){
                l_data_transfer.items.add(l_new_file_store[i]);
            }
            l_file_store.files = l_data_transfer.files;
            l_image_in_files = l_file_store.files.length;
            let l_base_number = parseInt(l_question_number)*(l_image_limit*2);
            let l_first_limit = parseInt(l_question_number)*(l_image_limit*2)+(l_image_in_files*2);
            let l_last_limit = (1+parseInt(l_question_number))*(l_image_limit*2);
            display_miniatures(l_base_number,l_first_limit,l_last_limit,l_file_store.files);
        });
    });

    l_questions.forEach( l_question => {
        l_question.addEventListener('click', (event) => {
            const l_classes = event.currentTarget.childNodes[1].classList;
            const l_question_content = event.currentTarget.nextSibling.nextSibling.classList;
            if (l_classes.contains('close')){
                l_classes.remove('close');
                l_question_content.remove('hidden');
                return;
            }
            l_classes.add('close');
            l_question_content.add('hidden');
        });
    });

    function display_miniatures(l_base_number,l_first_limit,l_last_limit,l_input_files) {
        for (let i = l_base_number; i < l_first_limit; i+=2 ){

            let l_img_link = window.URL.createObjectURL(l_input_files.item((i/2)%3));
            l_medias_img[i].src = l_img_link;
            l_medias_img[i+1].src = l_img_link;
            l_remove_images[i/2].style.display = 'block';
        }
        for (let i = l_first_limit; i < l_last_limit; i+=2 ){
            l_medias_img[i].src = '';
            l_medias_img[i+1].src = '';
            l_remove_images[i/2].style.display = 'none';
        }
    }
});