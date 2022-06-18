

$(document).ready(function() {
    $('#selectestado').select2();

    $('#selectmunicipio').select2();

    $('#selectlocalidad').select2();
});


$ (function (){
    $('#selectestado').on('change', onSelectEstadoChange); 
    $('#selectmunicipio').on('change', onSelectMunicipioChange);
});


    function onSelectEstadoChange(){
        var estado_id=$(this).val();
         if(!estado_id)
        {
            $('#selectmunicipio').html(' <option value="">Seleccionar Municipio</option>');
            $('#selectlocalidad').html(' <option value="">Seleccionar Localidad</option>');
      
            return;
        } 
        $.get('/obtenerMun/'+estado_id,function (data)
        {
            
        
            var html_select1=' <option value="">Seleccionar Municipio</option>';    
           for(var i=0;i<data.length;i++)
            {
           
                html_select1+=' <option value="'+data[i].id+'">'+data[i].nombre+'</option>';
   
            } 
            $('#selectmunicipio').html(html_select1);
      


        });

    }
    function onSelectMunicipioChange(){
        var municipio_id=$(this).val();
         if(!municipio_id)
        {
            $('#selectlocalidad').html(' <option value="">Seleccionar Localidad</option>');
      
            return;
        } 
        $.get('/obtenerLoc/'+municipio_id,function (data)
        {
        
            var html_select2=' <option value="">Seleccionar Localidad</option>';    
           for(var i=0;i<data.length;i++)
            {
           
                html_select2+=' <option value="'+data[i].id+'">'+data[i].nombre+'</option>';
   
            } 
            $('#selectlocalidad').html(html_select2);
      


        });


       

    }
  