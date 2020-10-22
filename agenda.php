<html>
    <head>
        <title>Agenda Telefonica</title>
        <style>
            #todosLosContactos div{
                float: left;
                border: solid 1px fuchsia;
                margin: 3px;
                width: 180px;
                height: 150px;
                overflow: auto;
                padding-left: 8px;
            }

            #divPagina {
                width: 80%;
                margin: 0 auto;
                border: solid 2px palevioletred; 
                border-radius: 5px;
                min-height: 500px;
            }

            #divBanner{
                height: 120px;
                background-color: rosybrown;
            }
        </style>

        <script language="javascript">
            //Objeto contacto con propiedades. Lo define
            function contacto(){
                this.nombre="";
                this.apellido_paterno="";
                this.apellido_materno="";
                this.telefono="";
            }

            //Var para almacenar contactos
            var contactos= new Array();

            //abreviatura del getElementByID
            function gi(id){
                return document.getElementById(id);
            }

            function agregarContacto(){
                gi("divForm").style.display='inline';
                gi('txtNombre').focus();
            }

            function ocultarForm(){
                gi('txtNombre').value ='';
                gi('txtAp').value ='';
                gi('txtAm').value ='';
                gi('txtTel').value ='';
                gi("divForm").style.display='none';
            }

            //Registra contacto agregado
            function guardar(){
                con = new contacto();
                con.nombre = gi('txtNombre').value;
                con.apellido_paterno = gi('txtAp').value;
                con.apellido_materno = gi('txtAm').value;
                con.telefono = gi('txtTel').value;
                contactos[contactos.length]=con;

                ocultarForm();
                mostrarContactos();
            }

            function borrarConfirmado(id_contacto){
                if(confirm("Est�s seguro que deseas eliminar el contacto?")){
                    borrar(id_contacto);
                }
            }

            function borrar(id_contacto){
                newCon= new Array();
                for(x=0; x<contactos.length; x++){
                    if(x != id_contacto){
                        newCon [newCon.length]= contactos[x];
                    }
                }
                contactos = newCon;
                mostrarContactos();
            }

            function editar(id_contacto){
                con = contactos[id_contacto];
                agregarContacto();
                gi('txtNombre').value =con.nombre;
                gi('txtAp').value =con.apellido_paterno;
                gi('txtAm').value =con.apellido_materno;
                gi('txtTel').value =con.telefono;
                borrar(id_contacto);
            }

            function mostrarContactos(){
                gi('todosLosContactos').innerHTML ='';

                for(x=0; x<contactos.length; x++){
                    con= contactos[x];
                    div= document.createElement('div');
                    div.setAttribute('class','contacto');
                    div.innerHTML = "Nombre: "+ con.nombre+ "<br/>"+ 
                    "Ap_P: "+con.apellido_paterno+ "<br/>"+ 
                    "Ap_M: "+con.apellido_materno+ "<br/>"+ 
                    "Tel: "+con.telefono+ "<br/>"+
                    "<button onclick='editar("+x+")'>Editar</button><button onclick='borrarConfirmado("+x+")'>Borrar</button>";
                    gi('todosLosContactos').appendChild(div);
                }
               
            }
        </script>
    </head>
        <body>
            <div id="divPagina">
                <div id="divBanner"></div>
                <div id="divCentro">
            <div id="Panel Acciones">
                <button onclick="agregarContacto(); ">Agregar Contacto</button>
            </div>
            <div id="divForm" style="display: none;">
                <table>
                    <tr>
                        <th>Nombre:</th>
                        <td><input type="text" id="txtNombre"/></td>
                    </tr>
                    <tr>
                        <th>Apellido Paterno:</th>
                        <td><input type="text" id="txtAp"/></td>
                    </tr>
                    <tr>
                        <th>Apellido Materno:</th>
                        <td><input type="text" id="txtAm"/></td>
                    </tr>
                    <tr>
                        <th>Telefono:</th>
                        <td><input type="text" id="txtTel"/></td>
                    </tr>  
                    <tr>
                        <td colspan="3" align="center">
                            <button onclick="guardar();">GUARDAR</button>
                        </td>
                    </tr>                     
                </table>
            </div>
            <fieldset>
                <legend>Contactos Agregados:</legend>
                <div id="todosLosContactos">
                    
                </div>
            </fieldset>
        </div>
    </div>
        </body>
</html>