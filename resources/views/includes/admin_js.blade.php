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

        @if(isset($data) && (isset($data->section_id) || isset($data->section)))
            $('select[name=section]').val("{{$data->section_id}}").trigger('change');
            @if($data->section)
            $('select[name=section]').val("{{$data->section}}").trigger('change');
            @endif
        @endif
        @if(isset($data) && isset($data->subject_id))
            $('select[name=subject]').val("{{$data->subject_id}}").change();
        @endif
    }

    $('.changeClass').on('change', function(){
        callApi('post',"{{route('admin.post.getSectionsByClass')}}",{class_id:$(this).val()},changeSectionSubject);
    });

    $(document).ready(function(){
        let class_id = $('.changeClass').val();
        if(class_id){
            callApi('post',"{{route('admin.post.getSectionsByClass')}}",{class_id:class_id},changeSectionSubject);
        }
    });

    $('.submitFilterForm').on('click',function(e){
        $(this).addClass('disabled');
        e.preventDefault();
        let exitLoop = true;
        let requiredInputs = $('.required');
        $(requiredInputs).each(function(){
            if($(this).val() != ''){
                
                exitLoop = false;
                scrollToElement($(this));
                // return false;
            }
            
        });
        if(!exitLoop){
            $(this).parents('form').submit();
            // submitFilterForm($(this).parents('form'));
        } else {
            responseToast(`Please Provide Some Inputs`,'bg-warning');
            $(this).removeClass('disabled');
        }
    });
    // js for form changes
    // $('select[name=class]').on('change',function(){
        
    // });

</script>