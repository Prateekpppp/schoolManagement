<script>

    
    $('.openEditModal').on('click', function(){
        let id = $(this).attr('data-id');
        $('.modal').find('#id').val(id);

    });

    // $('.openModal').on('click', function(){
    //     let id = $(this).attr('data-id');
    //     $('.modal').find('#id').val(id);

    // });
    
    function changeSectionSubject(response){
        $('.secAfter').nextAll().remove();
        $('.subAfter').nextAll().remove();

        let html = '';

        $(response.section).each(function(i,item){
            
            html += `
                <option value="${item.id}">${item.section}</option>
            `;    
            
        });

        $('.secAfter').after(html);
        html ='';
        
        $(response.subject).each(function(i,item){
            html += `
                <option value="${item.id}">${item.subject}</option>
            `;    
            
        });

        $('.subAfter').after(html);

    }

    $('.changeClass').on('change', function(){
        callApi('post',"{{route('admin.post.getSectionsByClass')}}",{class_id:$(this).val()},changeSectionSubject);
    });

    // js for form changes
    // $('select[name=class]').on('change',function(){
        
    // });

</script>