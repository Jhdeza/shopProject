(function ($) {
    $.Upload = {
        fn: $.fn.upload = function (options) {
            var obj = $.extend({}, $.Upload.defaultOptions, options, $(this).data());
            obj.cont = $(this);
            
            if (obj.simple) {
                obj.contlist = $('.parent-img-' + obj.id);
                obj.input_file = obj.cont.find('#' + obj.id);
    
                obj.begin = function () {
                    obj.cont.find(obj.trigger + ', ' + obj.btn_trigger).click(function () {
                        obj.input_file.click();
                    });
    
                    obj.input_file.change(function (e) {
                        preview(obj, options);
                        if (typeof obj.afterpreview === 'function') {
                            obj.afterpreview(e, obj);
                        }
                    });
    
                    obj.cont.find('.crud-file_remove-button').click(function (e) {
                        e.preventDefault();
                        obj.cont.find('img').attr('src', obj.cont.find('img').data().emtpy ?? '');
                        $(this).addClass('d-none');
                        obj.cont.find('#flag').val(false);
                    });
                };
            } else {
                obj.contlist = $(obj.contlist);
                obj.content = obj.cont.find('.con_list_imgs')
                obj.empty = obj.cont.find('.empty')
    
                obj.begin = function () {
                    if (obj.showbtns) {
                        obj.contlist.find('li').each(function () {
                            $.Upload.declareEvents($(this), obj);
                        });
                    }
    
                    obj.cont.find('#cancel').click(function () {
                        obj.contlist.empty();
                    });
    
                    obj.cont.find('#trigger').click(function (e) {
                        e.preventDefault();
                        obj.cont.find('#' + obj.id).click();
                        if (document.getElementById(obj.id).files.length > 0) {
                            upload2 = obj.cont.find('#' + obj.id)
                                .clone()
                                .attr('id', 'uploadClone')
                                .prependTo(obj.cont.find('#' + obj.id).parent());
                            b = document.getElementById('uploadClone');
                        }
                    });
    
                    obj.cont.find('#' + obj.id).change(function () {
                        b = document.getElementById(obj.id);
                        beforePrev(b, obj);
                    });
                };
            }
    
            obj.begin();
        },
        setEmpty: function (obj){
            obj.content.addClass('d-none')
            obj.empty.removeClass('d-none')
        },
        setNotEmpty: function (obj){
            obj.content.removeClass('d-none')
            obj.empty.addClass('d-none')
        },
        declareEvents: function (li, obj) {
            if (obj.useprev) {
                li.find('.card-tools > .set_main').on('click', function (e) {
                    e.stopPropagation();
                    $.Upload.changePre($(this), obj);
                });
            }
            li.find('.card-tools > .remove').on('click', function (e) {
                e.stopPropagation();
                $.Upload.removeImg($(this).parents('li'), obj);
            });
        },
        changePre : function(li, obj){
            li = li.parents('li');
            var firstLi = obj.contlist.find('.main:first');
            if(obj.contlist.find('li:first').hasClass('main')){
                var first = {
                    src: firstLi.find('img').prop('src'),
                    title: firstLi.find('.item input').val(),
                    siza: firstLi.find('.mailbox-attachment-size').text(),

                };
                var elem = {
                    src: li.find('img').prop('src'),
                    title: li.find('.item input').val(),
                    siza: li.find('.mailbox-attachment-size').text()
                };
                firstLi.find('img').prop('src', elem.src);
                firstLi.find('.item input').val(elem.title);
                firstLi.find('.mailbox-attachment-size').text(elem.size);

                if(li.hasClass('file') && !firstLi.hasClass('file'))
                    var fileToFirst = true;
                if(firstLi.hasClass('file') && !li.hasClass('file'))
                    var fileToLi = true;

                li.find('img').prop('src', first.src);
                li.find('.item input').val(first.title);
                li.find('.mailbox-attachment-size').text(first.size);

                if(fileToFirst)
                    firstLi.addClass('file');
                else
                    firstLi.removeClass('file');
                if(fileToLi)
                    li.addClass('file');
                else
                    li.removeClass('file');
            }
            else{
                firstLi = li.addClass('main').prependTo(obj.contlist);
            }
            var c = firstLi.find('.item input').val();
            c = c.replace("%20", " ");
            $('#pre_hidden_'+obj.id).val(c);
        },
        removeImg : function(li, obj){
            if(li.hasClass('main')){
                li.next().addClass('main');
                $('#pre_hidden_'+obj.id).val(li.next().find('img').prev().val());
            };
            if(li.hasClass('file')){//si tiene la clase file es un archivo ya adicionado anteriormente(editar)
                var mirror_hidden = $('#mirror_hidden_file_'+obj.id);
            }
            else
                var mirror_hidden = $('#mirror_hidden_'+obj.id);
            li.remove();
            console.log(mirror_hidden)
            if(mirror_hidden.val() == '')
                mirror_hidden.val(li.find('.item input').val());
            else
                mirror_hidden.val(mirror_hidden.val()+","+li.find('.item input').val());
            if(obj.contlist.find('li').length == 0)
                $.Upload.setEmpty(obj);
        },
        removeFromDeleted : function(name, obj){
            var mirror_hidden = $('#mirror_hidden_'+obj.id);
            if(mirror_hidden.val().indexOf(name) != -1){
                mirror_hidden.val(mirror_hidden.val().replace(name, ''));
            }
        },
        defaultOptions: {
            useprev: true,
            showbtns: true,
            contlist: '#list_imgs',
            trigger: '#trigger',
            btn_trigger: '#btn-trigger',
            afterpreview: undefined,
        },
    };
    
})(jQuery);

function preview(obj, options){
    
    var file = document.getElementById(obj.id);
    var files = file.files;
    f = files[0];
   
    obj.contlist.find('div').remove();
    if (!f.type.match('image.*')){
        obj.contlist.find('img').addClass('d-none');
        prevFile(f, obj);
    }
    else{
        var reader = new FileReader();
        var cont = 0;
        reader.onload = (function(theFile) {
            return function(e) {
                obj.contlist.find('img').removeClass('d-none').attr("src", e.target.result);
            };
        })(f);
        reader.readAsDataURL(f);        
    }
    obj.cont.find('.crud-file_remove-button').removeClass('d-none')
    obj.cont.find('#flag').val(true);
}

function beforePrev(file, obj){
    var files = file.files;
    for (var i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')){
            prevFile(f, obj);
        }
        else{
            previaImg(f, obj);
        }
    }
}

function previaImg(file, obj){
        var reader = new FileReader();
        var cont = 0;
        // Closure to capture the file information.
        reader.onload = (function(theFile){
            return function(e) {
            // Render thumbnail.
                let title = escape(theFile.name);
                let src = e.target.result;
                title = title.replace("%20", " ");
                $.Upload.removeFromDeleted(title, obj);
                var out = buildHtmlImg(title, src, obj, cont);
                obj.contlist.append(out);
                $.Upload.setNotEmpty(obj)
                $.Upload.declareEvents(obj.contlist.find('li:last'), obj);
                    cont++;
            };
        })(file);
        // Read in the image file as a data URL.
        reader.readAsDataURL(file);
}

function buildHtmlImg(title, src, obj, cont){
    let out = `<li 
        class="col-3 mb-4">
        <div class="card card-solid bg-transaparent-gradient">
            <div class="card-header p-0">               
                <div class="float-right card-tools bg-transparent" style="height:0px;width:auto">`;
                    if(obj.useprev)
                        out += `<button type="button" title="Portada" class="btn btn-tool set_main p-0" >
                            <i class="fas fa-check"></i>
                        </button> `;
                    out += `<button type="button" title="Remove" class="btn btn-tool remove p-0" >
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <input type="hidden" class="${cont}"/>                
                <div class="item">
                    <span>
                        <input type="hidden" value="${title}"/>
                        <img class="img img-fluid d-block" src="${src}">
                    </span>
                </div>
            </div>
        </div>
    </li>`;
    return out;
}

function prevFile(file, obj){
    if(obj.simple)
        var funct = createIconFileSimple;
    else
        var funct = createIconFile;

    if(file.type.match('doc.*')){
        funct(file, 'fa fa-file-word-o', obj);
    }
    else if(file.type.match('pdf.*')){
        funct(file, 'fa fa-file-pdf-o', obj);
    }
}

function createIconFileSimple(file, icon, obj){
    var out = '<div class="box-img-simple"><div class="card-header p-0">';
        if(obj.showBtns){
            out += '<div class="float-right card-tools bg-transparent" style="height:0px;width:auto"><button type="button" class="btn btn-primary btn-sm empty float-right" data-widget="remove" style="margin-left:4px;"><i class="fa fa-times"></i></button></div>';
        }
        out += '<div class="imgs-ja-simple"><span class="mailbox-attachment-icon"><i class="'+icon+'"></i></span><div class="mailbox-attachment-info"><a href="#" class="mailbox-attachment-name">'+file.name+'</a><span class="mailbox-attachment-size">'+Math.round(file.size/1024)+' KB</span></div></div>';

        obj.contlist.append(out);
}

function createIconFile(file, icon, obj){

    if(!obj.simple)
    $.Upload.removeFromDeleted(file.name, obj);
    var out ='<li><div class="card card-solid bg-transaparent-gradient" style=""><div class="card-header p-0">';
        if(obj.showBtns){
            out += '<div class="float-right card-tools bg-transparent" style="height:0px;width:auto"><button type="button" class="btn btn-primary btn-sm empty float-right" data-widget="remove" style="margin-left:4px;"><i class="fa fa-times"></i></button></div>';
        }
        out += '<div class="imgs-ja"><span class="mailbox-attachment-icon"><input type="hidden" value="'+file.name+'"/><i class="'+icon+'"></i></span><div class="mailbox-attachment-info"><a href="#" class="mailbox-attachment-name">'+file.name+'</a><span class="mailbox-attachment-size">'+Math.round(file.size/1024)+' KB</span></div></div></li>';

        obj.contlist.append(out);
        if(!obj.simple)
        $.Upload.declareEvents(obj.contlist.find('li:last'));
}
