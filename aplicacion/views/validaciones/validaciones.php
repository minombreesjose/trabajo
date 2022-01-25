<!--Validaciones de las Letras, para escribir solo letras-->
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<!--Fin de Validacion-->

<!--Validaciones de las Nmeros, para escribir solo Numeros-->
<script>
    function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " 1234567890";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>

<script type="text/javascript">
    function validar(e,solicitar){
      // Admitir solo letras
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron =/[\D\s\0-9]/;
      te = String.fromCharCode(tecla);
      if (!patron.test(te)) return false;
      // No amitir espacios iniciales y convertir 1ª letra a mayúscula
      txt = solicitar.value;
      if(txt.length==0 && te==' ') return false;
      if (txt.length==0 || txt.substr(txt.length-1,1)==' ') {
        solicitar.value = txt+te.toUpperCase();
        return false;
      } 
    }

</script>