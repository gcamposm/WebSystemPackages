<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SII | Servicio de Impuestos Internos</title>
  <link href='/responsive/css/general.min.css' rel='stylesheet'>
  <link href='/responsive/css/estilos_home.css' rel='stylesheet'>

  <script>

  setCookie("NSII", "", -1, "/", "sii.cl");
  setCookie("newSII", "", -1, "/", "sii.cl");

  function setCookie(name, value, validez, path, domain){
    var expires = new Date();
    expires.setTime(expires.getTime() + (validez*24*60*60*1000));
    document.cookie = name+"="+escape(value)+((expires)?";expires="+expires.toGMTString():"")+((path)?";path="+path:"")+((domain)?";domain="+domain:"");
  }

  var hostMiSII="https://misiir.sii.cl/cgi_misii/siihome.cgi";
  function CallMISII(option){
    var sreferer="";
    var irA=hostMiSII+"?page="+option;
    var shost=window.location.host;
    if(hostMiSII.indexOf(shost)<=0)/*no es el mismo*/
    {
      window.location = irA;
    }else{
      call_option(option);
      $("#my-menu").data( "mmenu" ).close();
    }
  }

  function getCookieHome(name) {
    var prefix = name + '=';
    var c = document.cookie;
    var nullstring = '';
    var cookieStartIndex = c.indexOf(prefix);
    if (cookieStartIndex == -1) return nullstring;
    var cookieEndIndex = c.indexOf(';', cookieStartIndex + prefix.length);
    if (cookieEndIndex == -1) cookieEndIndex = c.length; return unescape(c.substring(cookieStartIndex + prefix.length, cookieEndIndex));
  }

  function imprimeRutEncabezadoMovil(){
    var cook_rut = getCookieHome('RUT_NS');
    if (cook_rut!=''){
      document.write("Rut: "+cook_rut+"-"+getCookieHome("DV_NS")+" &nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='https://zeusr.sii.cl/cgi_AUT2000/autTermino.cgi'>Cerrar Sesi&oacute;n</a>");
    }
  }
  function imprimeRutEncabezado(){
    var cook_rut = getCookieHome('RUT_NS');
    if (cook_rut!=''){
      document.write("Rut: "+cook_rut+"-"+getCookieHome("DV_NS"));
    }
  }
  function imprimeCerrarSesion(){
    document.write("<a href='https://zeusr.sii.cl/cgi_AUT2000/autTermino.cgi'>Cerrar Sesi&oacute;n</a>");
  }


  // Valida navegador
  var ieUserAgent = {
    init: function () {
      // Get the user agent string
      var ua = navigator.userAgent;
      this.compatibilityMode = false;

      // Detect whether or not the browser is IE
      var ieRegex = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
      if (ieRegex.exec(ua) == null)
      this.exception = "The user agent detected does not contai Internet Explorer.";

      // Get the current "emulated" version of IE
      this.renderVersion = parseFloat(RegExp.$1);
      this.version = this.renderVersion;

      // Check the browser version with the rest of the agent string to detect compatibility mode
      if (ua.indexOf("Trident/6.0") > -1) {
        if (ua.indexOf("MSIE 7.0") > -1) {
          this.compatibilityMode = true;
          this.version = 10;                  // IE 10
        }
      }
      else if (ua.indexOf("Trident/5.0") > -1) {
        if (ua.indexOf("MSIE 7.0") > -1) {
          this.compatibilityMode = true;
          this.version = 9;                   // IE 9
        }
      }
      else if (ua.indexOf("Trident/4.0") > -1) {
        if (ua.indexOf("MSIE 7.0") > -1) {
          this.compatibilityMode = true;
          this.version = 8;                   // IE 8
        }
      }
      else if (ua.indexOf("MSIE 7.0") > -1)
      this.version = 7;                       // IE 7
      else
      this.version = 6;                       // IE 6
    }
  };

  // Initialize the ieUserAgent object
  ieUserAgent.init();

  if (navigator.userAgent.search("MSIE") >= 0){
    var val = "IE" + ieUserAgent.version;
    if (ieUserAgent.compatibilityMode){
      location.href = "http://www.sii.cl/pagina/intermedia/aviso_vista_compatibilidad.htm";
    }
    if(document.documentMode<9){
      location.href = "http://www.sii.cl/pagina/intermedia/aviso_modo_docto.htm";
    }
    if(ieUserAgent.version<9){
      location.href = "http://www.sii.cl/pagina/intermedia/version_no_compatible.htm";
    }
  }

  </script>
</head>
<body>
  <div id="my-wrapper">
    <!-- CABECERA MOVIL-->
    <div class='web-sii cabecera Fixed hidden-sm hidden-md hidden-lg'>
      <div class='header'>
        <nav class='navbar navbar-primary'>
          <div class='container'>
            <!-- BOTONES MOVIL -->
            <div class='navbar-header'>
              <button class='navbar-toggle pull-left' type='button' id='abrirMenu'> <span class='sr-only'>Mostrar menu</span> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span></button>
              <h1 class='hidden-sm hidden-md hidden-lg'><a href="http://homer.sii.cl/" title="Sii - Servicio de impuestos internos"><img src='/responsive/images/logo.jpg' alt='Sii - Servicio de impuestos internos'></a></h1>
              <button aria-expanded='false' data-target='#opciones_movil' data-toggle='collapse' class='navbar-toggle collapsed' type='button'><span aria-hidden='true' class='glyphicon glyphicon-user'></span></button>
              <div class='border'></div>
            </div>
            <!-- MENU OPCIONES -->
            <div id='opciones_movil' class='navbar-collapse collapse' aria-expanded='false' role='navigation'>
              <ul class='nav navbar-nav' style='display:block' id='sinAutenticacionMovil'>
                <li class='special'> <a href="https://misiir.sii.cl/cgi_misii/siihome.cgi">Ingresar a Mi Sii</a></li>
              </ul>
              <ul class='nav navbar-nav usuario' style='display:none' id='conAutenticacionMovil'>
                <li>
                  <span class='id'>
                    <script>imprimeRutEncabezadoMovil();</script>
                    <br />
                    <span id='lastConexionMovil'></span>
                  </span>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- MENU MOVIL -->
        <nav id='my-menu' style='display:none;'>
          <ul>

            <script>
            /* Evalúa autenticación en Mi SII*/
            var misiiCookieRead=getCookieHome("MISII");
            if (typeof misiiCookieRead !== "undefined" && misiiCookieRead != null && misiiCookieRead !="") {
              var obj = JSON.parse(misiiCookieRead);
                  document.write("             <li><span>Mi SII</span>\n");
    document.write("                  <ul>\n");
    document.write("						<li id='2331'><a href='javascript:CallMISII(2);'>Mis Datos Personales</a></li>\n");
    document.write("						<li id='2334'><a href='javascript:CallMISII(12)'>Mis Direcciones</a></li>\n");
    document.write("						<li id='2332'><a href='javascript:CallMISII(1)'>Mis Datos Tributarios</a></li>\n");
    document.write("						<li id='2333'><a href='javascript:CallMISII(17)'>Mis Caracter&iacute;sticas</a></li>\n");
    document.write("						<li id='2335'><a href='javascript:CallMISII(8)'>Mi Situaci&oacute;n Tributaria</a></li>\n");
    document.write("						<li id='2336'><a href='javascript:CallMISII(25)'>Mis Sociedades</a></li>\n");
    document.write("             <li><span>Mis Declaraciones</span>\n");
    document.write("							<ul>\n");
    document.write("                               <li id='2337'><a href='javascript:CallMISII(13)'>Anuales F22</a></li>\n");
    document.write("                               <li id='2338'><a href='javascript:CallMISII(10)'>Mensuales F29</a></li>\n");
    document.write("                               <li id='2339'><a href='javascript:CallMISII(11)'>Mensuales F50</a></li>\n");
    document.write("                               <li id='2340'><a href='javascript:CallMISII(19)'>Mensuales F3600</a></li>\n");
    document.write("                               <li id='2341'><a href='javascript:CallMISII(18)'>Juradas Renta</a></li>\n");
    document.write("                               <li id='2342'><a href='javascript:CallMISII(20)'>Juradas IVA Exportador</a></li>\n");
    document.write("							</ul>\n");
    document.write("						</li>\n");
    document.write("						<li id='2343'><a href='javascript:CallMISII(7)'>Mis Documentos autorizados</a></li>\n");
    document.write("						<li id='2344'><a href='javascript:CallMISII(9)'>Mis Bienes Ra&iacute;ces</a></li>\n");
    document.write("						<li id='2345'><a href='javascript:CallMISII(21)'>Mis Cartas </a></li>\n");
    document.write("						<li id='2346'><a href='javascript:CallMISII(96)'>Mis Notificaciones </a></li>\n");
    document.write("						<li id='2347'><a href='javascript:CallMISII(3)'>Mis Mensajes</a></li>\n");
    document.write("						<li id='2348'><a href='javascript:CallMISII(100)'>Mis Expedientes</a></li>\n");
    document.write("                  </ul>\n");
    document.write("             </li>\n");

              if(obj.p==true){
                document.getElementById("2340").style.display  = "none";
                document.getElementById("2341").style.display  = "none";
                document.getElementById("2342").style.display  = "none";
                document.getElementById("2333").style.display  = "none";
              }
            }else{
              document.write("                  <ul>\n");
              document.write("						<li><a  href='https://misiir.sii.cl/cgi_misii/siihome.cgi'>Ingresar a Mi SII</a></li>\n");
              document.write("                  </ul>\n");
              document.write("             </li>\n");
            }
            /* Fin Evalúa autenticación en Mi SII*/
            </script>

                             <li><span>Servicios online</span>
                      <ul>
    						<li><span>Clave secreta y Representantes electr&oacute;nicos</span>
    							<ul>
                                   <li><a href="http://www.sii.cl/servicios_online/1943-1945.html">Clave Secreta</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1943-1946.html">Representantes electr&oacute;nicos</a></li>
    							</ul>
    						</li>
    						<li><span>RUT e Inicio de actividades</span>
    							<ul>
                                   <li><a href="http://www.sii.cl/servicios_online/1031-1032.html">Inscripci&oacute;n y obtenci&oacute;n de N&deg; de RUT</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1031-1033.html">C&eacute;dula RUT electr&oacute;nica (e-RUT)</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1031-1034.html">Inicio de actividades</a></li>
    							</ul>
    						</li>
    						<li><span>Solicitudes y Actualizaci&oacute;n de informaci&oacute;n</span>
    							<ul>
                                   <li><a href="http://www.sii.cl/servicios_online/1037-1091.html">Reg&iacute;menes tributarios</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1037-1097.html">Verificaci&oacute;n de actividad</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1037-1100.html">Notificaci&oacute;n por correo electr&oacute;nico</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1037-1111.html">Solicitud de contabilidad computacional</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1037-1158.html">Impresoras fiscales</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1037-1173.html">M&aacute;quinas registradoras</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1037-1125.html">Actualizaci&oacute;n de informaci&oacute;n</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1037-1132.html">Dar aviso de p&eacute;rdida y/o recuperaci&oacute;n de c&eacute;dula de identidad</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1037-1140.html">Peticiones Administrativas</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1037-1145.html">Certificados a presentar ante Administraciones Tributarias Extranjeras</a></li>
    							</ul>
    						</li>
    						<li><span>Factura electr&oacute;nica</span>
    							<ul>
                                   <li><a href="http://www.sii.cl/servicios_online/1039-1182.html">Conozca sobre Factura Electr&oacute;nica</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1039-1183.html">Sistema de facturaci&oacute;n gratuito del SII</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1039-1184.html">Sistema de facturaci&oacute;n de mercado</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1039-3256.html">Registro de Compras y Ventas</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1039-1185.html">Consultas DTE</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1039-3201.html">Registro de Aceptaci&oacute;n o Reclamo de un DTE</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1039-1186.html">Consulta de contribuyentes</a></li>
                                   <li><a href="http://www.sii.cl/destacados/factura_electronica/cesion_facturas.html"> Publicaci&oacute;n de Facturas</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1039-3532.html">Boleta electr&oacute;nica de ventas y servicios</a></li>
    							</ul>
    						</li>
    						<li><span>Boletas de honorarios electr&oacute;nicas</span>
    							<ul>
                                   <li><a href="http://www.sii.cl/servicios_online/1040-1287.html">Emisor de boleta de honorarios</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1040-1309.html">Boleta de prestaci&oacute;n de servicios de terceros electr&oacute;nica</a></li>
                                   <li><a href="https://www.previsionsocial.gob.cl/sps/ley-honorarios/">Cotizaciones previsionales</a></li>
    							</ul>
    						</li>
    						<li><span>Libros contables electr&oacute;nicos</span>
    							<ul>
                                   <li><a href="http://www.sii.cl/servicios_online/1041-1324.html">Inscripci&oacute;n Libros Contables Electr&oacute;nicos</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1041-1334.html">Env&iacute;o de Documentos</a></li>
    							</ul>
    						</li>
    						<li><span>Impuestos mensuales</span>
    							<ul>
                                   <li><a href="http://www.sii.cl/servicios_online/1042-3264.html">Declaraci&oacute;n mensual (F29)</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1042-3265.html">Declaraci&oacute;n mensual (F50)</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1042-3253.html">Registro de Compras y Ventas</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1042-3267.html">Asistente para c&aacute;lculos</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1042-3266.html">Consulta y seguimiento (F29 y F50)</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1042-1398.html">Solicitud Devoluci&oacute;n IVA Exportador (F3600)</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1042-1421.html">Solicitud Devoluci&oacute;n Cambio de Sujeto (F3560)</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1042-1414.html">Importador de Libros de Compras y Ventas</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1042-1435.html">Otras aplicaciones y N&oacute;minas</a></li>
    							</ul>
    						</li>
    						<li><span>Declaraciones juradas</span>
    							<ul>
                                   <li><a href="http://www.sii.cl/servicios_online/1043-1451.html">Declaraciones juradas de IVA</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1043-1518.html">Declaraciones juradas de Renta</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1043-1562.html">Declaraci&oacute;n jurada de impuesto de timbres y estampilla</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1043-1576.html">Declaraciones juradas de bienes ra&iacute;ces</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1043-1584.html">Registro de inversiones en el extranjero</a></li>
    							</ul>
    						</li>
    						<li><span>Declaraci&oacute;n de renta</span>
    							<ul>
                                   <li><a href="https://alerce.sii.cl/dior_cgi/ren_mp/REN_MenusRenta.cgi?opcion=11">Declarar Renta (F22)</a></li>
                                   <li><a href="https://alerce.sii.cl/dior_cgi/ren_mp/REN_MenusRenta.cgi?opcion=1">Corregir o rectificar declaraci&oacute;n</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1044-2696.html">Consulta y seguimiento</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1044-2701.html">Asistentes para c&aacute;lculos</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1044-2712.html">Declaraci&oacute;n jurada simple de cesi&oacute;n de beneficio de cr&eacute;dito por gastos en educaci&oacute;n, art.55ter.</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1044-2716.html">Anticipo Devoluci&oacute;n impuesto a la renta a&ntilde;o tributario 2010</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1044-2718.html">Bonificaci&oacute;n Ahorro Previsional Voluntario</a></li>
    							</ul>
    						</li>
    						<li><span>Infracciones, Pago de giros y Condonaciones</span>
    							<ul>
                                   <li><a href="http://www.sii.cl/servicios_online/1045-3212.html">Infracciones</a></li>
                                   <li><a href="https://www4.sii.cl/pagoGiro/">Pago de Giros</a></li>
    							</ul>
    						</li>
    						<li><span>T&eacute;rmino de giro</span>
    							<ul>
                                   <li><a href="https://www4.sii.cl/sistgiInternet/?opc=dec">Declarar t&eacute;rmino de giro </a></li>
                                   <li><a href="https://www4.sii.cl/sistgiInternet/?opc=con">Consultar declaraci&oacute;n de t&eacute;rmino de giro </a></li>
                                   <li><a href="https://www4.sii.cl/consultaTGIInternet/">Certificado de t&eacute;rmino de giro emitidos antes del 08/08/2016</a></li>
    							</ul>
    						</li>
    						<li><span>Situaci&oacute;n tributaria</span>
    							<ul>
                                   <li><a href="https://zeus.sii.cl/cvc/vdc/index.html">Consultar timbraje de documentos</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1047-1690.html">Consultar y revisar situaci&oacute;n tributaria</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1047-1702.html">Carpeta tributaria electr&oacute;nica</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1047-1714.html">N&oacute;minas</a></li>
    							</ul>
    						</li>
    						<li><span>Herencias</span>
    							<ul>
                                   <li><a href="https://www4.sii.cl/dphiDeclaracionesInternet/">Declarar Impuesto a las herencias Intestadas (F4423)</a></li>
                                   <li><a href="https://www4.sii.cl/consdphiInternet/">Consulta certificado de herencias intestadas (F4423)</a></li>
    							</ul>
    						</li>
    						<li><span>Aval&uacute;os y Contribuciones de bienes ra&iacute;ces</span>
    							<ul>
                                   <li><a href="http://www.sii.cl/servicios_online/1048-2623.html">Contribuciones</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1048-2569.html">Consulta aval&uacute;os y certificados</a></li>
                                   <li><a href="http://www.sii.cl/destacados/reavaluo/2018/">Reaval&uacute;o de bienes ra&iacute;ces</a></li>
                                   <li><a href="http://www.sii.cl/sitios_de_interes/aplicaciones_para_entidades_externas.html">Aplicaciones para entidades externas</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1048-2573.html">Solicitudes</a></li>
    							</ul>
    						</li>
    						<li><span>Tasaci&oacute;n fiscal de veh&iacute;culos</span>
    							<ul>
                                   <li><a href="https://www4.sii.cl/vehiculospubui/#/searchtasacion">Consulta tasaci&oacute;n de veh&iacute;culos</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1049-2612.html">Tasaci&oacute;n hist&oacute;rica de veh&iacute;culos (bajada de datos)</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1049-2618.html">Impuesto a emisiones contaminantes veh&iacute;culos nuevos</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1049-3527.html">Resoluciones</a></li>
                                   <li><a href="http://www.sii.cl/servicios_online/1049-3137.html">Declaraci&oacute;n de Veh&iacute;culos Motorizados</a></li>
    							</ul>
    						</li>
                      </ul>
                 </li>


            <li><a href="http://www.sii.cl/ayudas/">Ayuda</a></li>

                             <li><span>Contacto</span>
                      <ul>
    						<li><a href="https://zeus.sii.cl/dii_cgi/calidad/contactenos.cgi?tide_codigo=11&opciones_tide=10o11">Felicitaciones y sugerencias</a></li>
    						<li><a href="http://www.sii.cl/ayudas/asistencia/3042-3045.html">Orientaci&oacute;n y reclamos</a></li>
    						<li><a href="http://www.sii.cl/ayudas/asistencia/3042-3047.html">Denuncias sobre evasi&oacute;n</a></li>
    						<li><a href="http://www.sii.cl/ayudas/asistencia/3042-3044.html">Mesa de ayuda</a></li>
    						<li><a href="http://www.sii.cl/ayudas/asistencia/oficinas/3048-3049.html">Oficinas y horarios</a></li>
                      </ul>
                 </li>


          </ul>
        </nav>
        <!-- FIN MENU MOVIL -->
      </div>
    </div>
    <!-- FIN CABECERA MOVIL-->
    <!-- CABECERA DESKTOP-->
    <div class='web-sii cabecera hidden-xs'>
      <div class='header'>
        <nav class='navbar navbar-primary'>
          <div class='container'>
            <!-- MENU OPCIONES -->
            <div id='opciones' class='navbar-collapse collapse' aria-expanded='false' role='navigation'>
              <ul class='nav navbar-nav' style='display:block' id='sinAutenticacion'>
                <li class='special'>
                  <a href="https://misiir.sii.cl/cgi_misii/siihome.cgi">Ingresar a Mi Sii</a>
                </li>
              </ul>
              <ul class='nav navbar-nav usuario' style='display:none' id='conAutenticacion'>
                <li>
                  <span class='id'>
                    <script>imprimeRutEncabezado();</script>
                    <br />
                    <span id='lastConexion'></span>
                  </span>
                </li>
              </ul>
              <span class='nav navbar-nav navbar-right hidden-xs' id='cerrar-sesion' style='display:none'>
                <a href='https://zeusr.sii.cl/cgi_AUT2000/autTermino.cgi'>Cerrar Sesi&oacute;n</a>
              </span>
            </div>
          </div>
        </nav>
        <div class='container'>
          <h1 class='pull-left hidden-xs logo'><a href="http://homer.sii.cl/" title='Sii - Servicio de impuestos internos'><img src='/responsive/images/logo.jpg' alt='Sii - Servicio de impuestos internos'></a></h1>
          <!-- MENU DESKTOP -->
          <ul class='dropdown nav navbar-nav hidden-xs' id='main-menu'>
            <li style="padding-top:2px"><a role='button' href="https://misiir.sii.cl/cgi_misii/siihome.cgi">Mi Sii</a></li>
                   <li class='dropdown'><a role='button' data-toggle='dropdown' class='#' data-target='#' href='#'>Servicios online <i class='fa fa-caret-down' aria-hidden='true'></i></a>
          <ul class='dropdown-menu' role='menu'>
    						<li><a href="http://www.sii.cl/servicios_online/1943-.html">Clave secreta y Representantes electr&oacute;nicos</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1031-.html">RUT e Inicio de actividades</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1037-.html">Solicitudes y Actualizaci&oacute;n de informaci&oacute;n</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1039-.html">Factura electr&oacute;nica</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1040-.html">Boletas de honorarios electr&oacute;nicas</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1041-.html">Libros contables electr&oacute;nicos</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1042-.html">Impuestos mensuales</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1043-.html">Declaraciones juradas</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1044-.html">Declaraci&oacute;n de renta</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1045-.html">Infracciones, Pago de giros y Condonaciones</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1046-.html">T&eacute;rmino de giro</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1047-.html">Situaci&oacute;n tributaria</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/3140-.html">Herencias</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1048-.html">Aval&uacute;os y Contribuciones de bienes ra&iacute;ces</a></li>
    						<li><a href="http://www.sii.cl/servicios_online/1049-.html">Tasaci&oacute;n fiscal de veh&iacute;culos</a></li>
                      </ul>
                 </li>

            <li style="padding-top:2px"><a role='button' class='#' data-target='#' href="http://www.sii.cl/ayudas/">Ayuda</a></li>
                                       <li class='dropdown' role='presentation'> <a aria-expanded='false' aria-haspopup='true' role='button' data-toggle='dropdown' class='dropdown-toggle' href='#' id='drop6'> Contacto <i class='fa fa-caret-down' aria-hidden='true'></i></a>
                              <ul aria-labelledby='drop6' class='dropdown-menu' id='menu3'>
    						<li><a href='https://zeus.sii.cl/dii_cgi/calidad/contactenos.cgi?tide_codigo=11&opciones_tide=10o11'> <i class='fa fa-thumbs-o-up fa-2x' aria-hidden='true'></i> Felicitaciones y sugerencias</a></li>
    						<li><a href='http://www.sii.cl/ayudas/asistencia/3042-3045.html'> <i class='fa fa-hand-o-up fa-2x' aria-hidden='true'></i> Orientaci&oacute;n y reclamos</a></li>
    						<li><a href='http://www.sii.cl/ayudas/asistencia/3042-3047.html'> <i class='fa fa-exclamation-triangle fa-2x' aria-hidden='true'></i> Denuncias sobre evasi&oacute;n</a></li>
    						<li><a href='http://www.sii.cl/ayudas/asistencia/3042-3044.html'> <i class='fa fa-phone fa-2x' aria-hidden='true'></i> Mesa de ayuda</a></li>
    						<li><a href='http://www.sii.cl/ayudas/asistencia/oficinas/3048-3049.html'> <i class='fa fa-map-marker fa-2x' aria-hidden='true'></i> Oficinas y horarios</a></li>
                      </ul>
                 </li>

          </ul>
          <!-- FIN MENU DESKTOP -->
        </div>
      </div>
    </div>
    <!-- FIN CABECERA -->
    <!-- CARRUSEL -->
    <div class="web-sii">
      <div class="carrusel">
        <div class="container">
          <div id="carousel" class="carousel carousel-fade slide" data-ride="carousel">
              <!-- ELEMENTOS DEL CARRUSEL -->
<div class='carousel-inner' role='listbox'>
   <div class='item active'>
      <div class='texto'>
         <p class='big'>Obt&eacute;n o recupera tu clave secreta y accede a todos los servicios en l&iacute;nea que tenemos para ti</p>
         <p><button onClick='javascript:location.href="http://www.sii.cl/servicios_online/1943-1945.html"' class='btn btn-default'>Ingresa aqu&iacute; </button></p>
      </div>
      <img src='/img/carrusel_1_0E8F4.png' alt='carrusel_clave.png' title='carrusel_clave.png' style='margin-left:10px;'>
   </div>
   <div class='item'>
      <div class='texto'>
         <p class='big'>&iquest;Se te pas&oacute; el plazo para pagar tus contribuciones?</p>
         <p class='medium'>Te facilitamos el pago por internet, no esperes m&aacute;s.</p>
         <p><button onClick='javascript:location.href="http://www.sii.cl/servicios_online/1048-2623.html"' class='btn btn-default'>Ingresa aqu&iacute;</button></p>
      </div>
      <img src='/img/carrusel_1_CBE44.png' alt='contribuciones_plazos ' title='contribuciones_plazos ' style='margin-left:10px;'>
   </div>
</div>
<ol class='carousel-indicators'>
   <li data-target='#carousel' data-slide-to='0' class='active'></li>
   <li data-target='#carousel' data-slide-to='1'></li>
</ol>

          </div>
        </div>
      </div>
    </div>
    <!-- FIN CARRUSEL -->
    <!-- CUERPO -->
    <div class="web-sii cuerpo home">
      <div class="container">
        <!-- BLOQUES OPCIONES -->
        <div class="row fila-home-azul">
          <!-- OPCION MOVIL -->
          <div class="col-sm-4 visible-xs">
            <div class="home-azul">
              <button aria-expanded="false" data-target="#home-app-movil" data-toggle="collapse" class="navbar-toggle btn-search collapsed arrow-click" type="button"><span aria-hidden="true" class="glyphicon glyphicon-menu-down"></span>Tr&aacute;mites para m&oacute;vil</button>
              <ul class="list-unstyled navbar-collapse collapse" id="home-app-movil">
                                                   <li><a href="https://m.sii.cl/bhem/index.htm??rnd=0.8360431597987508">Boleta de honorarios</a></li>
                                   <li><a href="https://m.sii.cl/mcedula/index.htm?rnd=0.7157762792106939">C&eacute;dula electr&oacute;nica</a></li>
                                   <li><a href="http://m.sii.cl/stcm/index.htm">Consulta situaci&oacute;n de terceros</a></li>
                                   <li><a href="https://m.sii.cl/autmovil/autMOVIL.html?https://m.sii.cl/cgi_iniactm/clientIniAct.cgi?tipo=1">Inicio actividad 2da categor&iacute;a</a></li>
                                   <li><a href="https://m.sii.cl/autmovil/autMOVIL.html?https://m.sii.cl/cgi_ivaf29m/prgIvaF29.cgi?tipo=1">IVA (F29) sin movimiento</a></li>

              </ul>
            </div>
          </div>
          <div class="col-sm-4 visible-xs">
            <div class="home-azul">
              <button onClick="javascript:window.location.href='http://www.sii.cl/ayudas/apps/'" aria-expanded="false" data-target="#home-apps-movil" data-toggle="collapse" class="navbar-toggle btn-search collapsed arrow-click" type="button">APP's</button>
            </div>
          </div>
          <!-- FIN OPCION MOVIL -->
          <div class="col-sm-4">
            <div class="home-azul">
              <h2 class="hidden-xs">Accesos directos</h2>
              <button aria-expanded="false" data-target="#home-servicios" data-toggle="collapse" class="navbar-toggle btn-search collapsed arrow-click" id="btn-tramites" type="button"><span aria-hidden="true" class="glyphicon glyphicon-menu-down"></span>Accesos directos</button>
              <ul class="list-unstyled navbar-collapse collapse" id="home-servicios">
                <li style="padding-bottom:5px;"><a href="http://www.sii.cl/servicios_online/1039-3256.html">Registro de Compras y Ventas</a></li>
                <li style="padding-bottom:5px;"><a href="http://www.sii.cl/servicios_online/1042-3264.html">Declarar F29</a></li>
                <li style="padding-bottom:5px;"><a href="http://www.sii.cl/servicios_online/1040-1287.html#-collapseOne">Emitir Boleta de honorarios electr&oacute;nica</a></li>					 
                <li style="padding-bottom:5px;"><a href="javascript:AbreModal('modal_rcv');">Emitir Factura electrónica y DTE</a></li>
                <li style="padding-bottom:5px;"><a href="https://palena.sii.cl/rtc/RTC/RTCMenu.html">Cesi&oacute;n de documentos electr&oacute;nicos</a></li>
				<li style="padding-bottom:5px;"><a href="https://zeus.sii.cl/avalu_cgi/br/brcc00.sh">Pagar Contribuciones</a></li>
				
				
				
              </ul>
            </div>
          </div>
			<div class="col-sm-4">
			  <div class="home-azul home-azul-claro">
				<a href="http://www.sii.cl/destacados/renta/2019/personas.html">
				  <img src="http://www.sii.cl/icn/banner_renta019.png" class="img-responsive" title="Declaraciones Juradas" alt="Cat&aacute;logo de Esquemas Tributarios"/>
				</a>
			  </div>
			</div>
			<div class="col-sm-4">
			  <div class="home-azul">
				<h2 class="hidden-xs">Ayuda</h2>
				<button aria-expanded="false" data-target="#home-ayuda" data-toggle="collapse" class="navbar-toggle btn-search collapsed arrow-click" id="btn-ayuda" type="button"><span aria-hidden="true" class="glyphicon glyphicon-menu-down"></span> Ayuda</button>
				<ul class="list-unstyled navbar-collapse collapse" id="home-ayuda">
				  <li><a href="http://www.sii.cl/ayudas/formularios/">Formularios</a></li>
				  <li><a href="http://www.sii.cl/preguntas_frecuentes/preguntasfrecuentes.htm">Preguntas frecuentes</a></li>
				  <li><a href="http://www.sii.cl/ayudas/como_se_hace_para/index.html">&iquest;C&oacute;mo se hace para…?</a></li>
				  <li class="visible-xs"><a href="http://m.sii.cl/cgi_calendario/calendario.cgi?VIEW=2">Calendario Tributario</a></li>
				  <li class="hidden-xs"><a href="https://misii.sii.cl/cgi_calendario/calendario.cgi">Calendario Tributario</a></li>
				  <li><a href="http://www.sii.cl/ayudas/asistencia/oficinas/3048-3049.html">Oficinas y horarios</a></li>
				  <li><a href="http://www.sii.cl/ayudas/asistencia/3042-3044.html">Mesa de ayuda</a></li>
				  <li class="spacer"></li>
				  <li><a href="http://www.sii.cl/ayudas/">Ver toda la Ayuda</a></li>
				</ul>
			  </div>
			</div>
		  </div>
		  <!-- FIN BLOQUES OPCIONES -->
		  <!-- DESTACADOS Y NOTICIAS -->
<div class='row'>
	<div class='col-sm-8'>
   <div class='bloque-home'>
      <h2><strong>Destacados</strong> <a href='http://www.sii.cl/destacados/' class='pull-right'>Ver m&aacute;s destacados</a></h2>
   <div class='row'>
         <div class='col-sm-4'> <a href='http://www.sii.cl/destacados/renta/2019/empresas.html'> <img src='/img/destacados_60C68.jpg' class='img-responsive' alt='Portal Declaraciones Renta para empresas' title='Portal Declaraciones Renta para empresas'><span>Portal Declaraciones Renta para empresas</span></a> </div>
         <div class='col-sm-4'> <a href='http://www.sii.cl/destacados/reavaluo/2018/index.html'> <img src='/img/destacados_638D2.jpg' class='img-responsive' alt='Portal de Reaval&uacute;o' title='Portal de Reaval&uacute;o'><span>Portal de Reaval&uacute;o</span></a> </div>
         <div class='col-sm-4'> <a href='http://www.sii.cl/destacados/sii_educa/'> <img src='/img/destacados_siieduca.jpg' class='img-responsive' alt='Portal de Educaci&oacute;n Tributaria' title='Portal de Educaci&oacute;n Tributaria'><span>Portal de Educaci&oacute;n Tributaria</span></a> </div>
      </div>
   <div class='row navbar-collapse collapse' aria-expanded='false' id='detacados-sm' role='complementary'>
         <div class='col-sm-4'> <a href='http://www.sii.cl/destacados/factura_electronica/cesion_facturas.html'> <img src='/img/destacados_mercado_publico_facturas.jpg' class='img-responsive' alt='Publicaci&oacute;n de Facturas' title='Publicaci&oacute;n de Facturas'><span>Publicaci&oacute;n de Facturas</span></a> </div>
         <div class='col-sm-4'> <a href='https://www4.sii.cl/sistemacharlasui/internet/#/public'> <img src='/img/destacados_charlasreforma.jpg' class='img-responsive' alt='Charlas de Asistencia al Contribuyente' title='Charlas de Asistencia al Contribuyente'><span>Charlas de Asistencia al Contribuyente</span></a> </div>
         <div class='col-sm-4'> <a href='http://www.sii.cl/destacados/ogp/'> <img src='/img/destacados_estadisticas_tributarias.jpg' class='img-responsive' alt='Portal de Estad&iacute;sticas Tributarias' title='Portal de Estad&iacute;sticas Tributarias'><span>Portal de Estad&iacute;sticas Tributarias</span></a> </div>
      </div>
      <button aria-expanded='false' data-target='#detacados-sm' data-toggle='collapse' class='navbar-toggle btn-search collapsed arrow-click' id='destacados' type='button'><span aria-hidden='true' class='glyphicon glyphicon-menu-down'></span></button>
   </div>
</div>


			<div class="col-sm-4">
			  <h2>Noticias <a href="http://www.sii.cl/noticias/2019/index.html" class="pull-right">Ver m&aacute;s noticias</a></h2>
			  <ul class="list-unstyled noticias-home">
				<li><span>13 de mayo de 2019</span><a href='http://www.sii.cl/noticias/2019/130519noti01aav.htm'><img src='/img/130519noti01aav_2cd1e.jpg' class='img-responsive hidden-xs' alt='SII recibi&oacute; cerca de 3 millones 800 mil declaraciones en Operaci&oacute;n Renta 2019' title='SII recibi&oacute; cerca de 3 millones 800 mil declaraciones en Operaci&oacute;n Renta 2019'>SII recibi&oacute; cerca de 3 millones 800 mil declaraciones en Operaci&oacute;n Renta 2019</a></li>
				<li><span>9 de mayo de 2019</span><a href='http://www.sii.cl/noticias/2019/090519noti01er.htm'>Declaraci&oacute;n de Prensa</a></li>
				<li><span>3 de mayo de 2019</span><a href='http://www.sii.cl/noticias/2019/030519noti01aav.htm'>SII autoriz&oacute; la devoluci&oacute;n anticipada de excedentes a m&aacute;s de 2 millones de contribuyentes</a></li>
			  </ul>
			</div>
		  </div>
		  <!-- FIN DESTACADOS Y NOTICIAS -->
		  <hr>
		  <!-- CARRUSEL BANNERS -->
          <div id="carrusel_links" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner">
                <div class="item active">
                   <a href="https://www.previsionsocial.gob.cl/sps/ley-honorarios/" target="_blank" title="Trabajadores a honorarios">
                      <img src="/img/bnr_cotizaciones_honorarios.jpg" alt="Trabajadores a honorarios" class="img-responsive">
                   </a>
                   <a href="http://www.sii.gob.cl/transparencia/" title="Gobierno Transparente">
                      <img src="/img/banner_gob_transparente.gif" alt="Gobierno Transparente" class="img-responsive">
                   </a>
                   <a href="http://www.sii.gob.cl/transparencia/solicitud_informacion.html" title="Solicitud de informaci&oacute;n">
                      <img src="/img/tranparencia_solicitud_infor.jpg" alt="Solicitud de informaci&oacute;n" class="img-responsive">
                   </a>
                </div>
               
                <div class="item">
                   <a href="http://www.sii.cl/sobre_el_sii/codigoetica_sii.pdf" title="C&oacute;digo de &eacute;tica">
                      <img src="/img/bnr_codigo_etica.png" alt="C&oacute;digo de &eacute;tica" class="img-responsive">
                   </a>
                   <a href="https://www.previsionsocial.gob.cl/sps/ley-honorarios/" target="_blank" title="Trabajadores a honorarios">
                      <img src="/img/bnr_cotizaciones_honorarios.jpg" alt="Trabajadores a honorarios" class="img-responsive">
                   </a>
                   <a href="http://www.sii.gob.cl/transparencia/" title="Gobierno Transparente">
                      <img src="/img/banner_gob_transparente.gif" alt="Gobierno Transparente" class="img-responsive">
                   </a>
                </div>

                <div class="item">
                   <a href="http://www.sii.gob.cl/transparencia/solicitud_informacion.html" title="Solicitud de informaci&oacute;n">
                      <img src="/img/tranparencia_solicitud_infor.jpg" alt="Solicitud de informaci&oacute;n" class="img-responsive">
                   </a>
                   <a href="http://www.sii.cl/sobre_el_sii/codigoetica_sii.pdf" title="C&oacute;digo de &eacute;tica">
                      <img src="/img/bnr_codigo_etica.png" alt="C&oacute;digo de &eacute;tica" class="img-responsive">
                   </a>
                   <a href="https://www.previsionsocial.gob.cl/sps/ley-honorarios/" target="_blank" title="Trabajadores a honorarios">
                      <img src="/img/bnr_cotizaciones_honorarios.jpg" alt="Trabajadores a honorarios" class="img-responsive">
                   </a>
                </div>
					 
                <div class="item">
                   <a href="http://www.sii.gob.cl/transparencia/" title="Gobierno Transparente">
                      <img src="/img/banner_gob_transparente.gif" alt="Gobierno Transparente" class="img-responsive">
                   </a>
                   <a href="http://www.sii.gob.cl/transparencia/solicitud_informacion.html" title="Solicitud de informaci&oacute;n">
                      <img src="/img/tranparencia_solicitud_infor.jpg" alt="Solicitud de informaci&oacute;n" class="img-responsive">
                   </a>
                   <a href="http://www.sii.cl/sobre_el_sii/codigoetica_sii.pdf" title="C&oacute;digo de &eacute;tica">
                      <img src="/img/bnr_codigo_etica.png" alt="C&oacute;digo de &eacute;tica" class="img-responsive">
                   </a>
                </div>
					 
             </div>

             <a class="left carousel-control" href="#carrusel_links" data-slide="prev">‹</a>
             <a class="right carousel-control" href="#carrusel_links" data-slide="next">›</a>
          </div>
		  <!-- FIN CARRUSEL BANNERS -->
		</div>
	  </div>
	  <!-- FIN CUERPO -->

	  <!-- PIE -->
	  <div class='web-sii pie'>
		<footer>
		  <div class='container'>
			<div class='row hidden-xs'>
    <div class='col-sm-12 col-md-2-5'>
       <h3 class='hidden-xs'>Valores y fechas</h3>
       <div class='btn btn-block navbar-toggle hidden-sm hidden-md hidden-lg arrow-click' data-target='.pie01' data-toggle='collapse'><span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span>Valores y fechas</div>
       <ul class='list-unstyled collapse navbar-collapse pie01'>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/uf/uf2019.htm">UF</a></li>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/dolar/dolar2019.htm">D&oacute;lar</a></li>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/utm/utm2019.htm">UTM-UTA-IPC</a></li>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/renta/datos_valores_renta.html">Datos y valores de Renta</a></li>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/iva/datos_valores_iva.html">Datos y valores de IVA</a></li>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/otros_valores/otros_valores.html">Otros valores</a></li>
       </ul>
    </div>
    <div class='col-sm-12 col-md-2-5'>
       <h3 class='hidden-xs'>Normativa y legislaci&oacute;n</h3>
       <div class='btn btn-block navbar-toggle hidden-sm hidden-md hidden-lg arrow-click' data-target='.pie02' data-toggle='collapse'><span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span>Normativa y legislaci&oacute;n</div>
       <ul class='list-unstyled collapse navbar-collapse pie02'>
                                   <li><a href="http://www.sii.cl/normativa_legislacion/circulares/2019/indcir2019.htm">Circulares</a></li>
                                   <li><a href="http://www.sii.cl/normativa_legislacion/resoluciones/2019/res_ind2019.htm">Resoluciones</a></li>
                                   <li><a href="https://www4.sii.cl/consultaProyectosNormativosInternet/#Inicio">Consulta p&uacute;blica de normas</a></li>
                                   <li><a href="https://www3.sii.cl/normaInternet/">Administrador de contenido normativo</a></li>
                                   <li><a href="https://www4.sii.cl/acjui/internet/#/instancia/1">Administrador de Contenido de Jurisprudencia</a></li>
                                   <li><a href="http://www.sii.cl/normativa_legislacion/legislacion_tributaria.html">Legislaci&oacute;n tributaria y convenios internacionales</a></li>
                                   <li><a href="http://www.sii.cl/normativa_legislacion/jurisprudencia_y_tribunales.html">Jurisprudencia y tribunales</a></li>
       </ul>
    </div>
    <div class='col-sm-12 col-md-2-5'>
       <h3 class='hidden-xs'>Redes sociales</h3>
       <div class='btn btn-block navbar-toggle hidden-sm hidden-md hidden-lg arrow-click' data-target='.pie03' data-toggle='collapse'><span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span>Redes sociales</div>
       <ul class='list-unstyled collapse navbar-collapse pie03'>
                                   <li><a href="https://www.facebook.com/impuestosinternoschile/">Facebook</a></li>
                                   <li><a href="https://twitter.com/SII_Chile">Twitter</a></li>
                                   <li><a href="https://www.youtube.com/user/sii/">Youtube</a></li>
                                   <li><a href="http://www.sii.cl/redes_sociales/rss.html">RSS</a></li>
                                   <li><a href="http://www.sii.cl/ayudas/apps/">APP&acute;s</a></li>
       </ul>
    </div>
    <div class='col-sm-12 col-md-2-5'>
       <h3 class='hidden-xs'>Sitios de inter&eacute;s</h3>
       <div class='btn btn-block navbar-toggle hidden-sm hidden-md hidden-lg arrow-click' data-target='.pie04' data-toggle='collapse'><span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span>Sitios de inter&eacute;s</div>
       <ul class='list-unstyled collapse navbar-collapse pie04'>
                                   <li><a href="http://www.sii.cl/sitios_de_interes/sinteres_appdoc.html">Aplicaciones y documentos</a></li>
                                   <li><a href="http://www.sii.cl/sitios_de_interes/sinteres_wutiles.html">Web &uacute;tiles</a></li>
                                   <li><a href="http://www.sii.cl/sitios_de_interes/sinteres_sgob.html">Sitios de gobierno relacionados</a></li>
                                   <li><a href="http://www.sii.cl/sitios_de_interes/sinteres_orgrelacionados.html">Organismos relacionados</a></li>
                                   <li><a href="http://www.sii.cl/asuntos_internacionales/">Intercambios de Informaci&oacute;n - Est&aacute;ndar CRS</a></li>
       </ul>
    </div>
    <div class='col-sm-12 col-md-2-5'>
       <h3 class='hidden-xs'>Sobre el SII</h3>
       <div class='btn btn-block navbar-toggle hidden-sm hidden-md hidden-lg arrow-click' data-target='.pie05' data-toggle='collapse'><span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span>Sobre el SII</div>
       <ul class='list-unstyled collapse navbar-collapse pie05'>
                                   <li><a href="http://www.sii.cl/sobre_el_sii/nuestro_servicio.htm">Nuestro Servicio</a></li>
                                   <li><a href="http://www.sii.cl/sobre_el_sii/trabaja_con_nosotros.html">Trabaja con nosotros</a></li>
                                   <li><a href="http://www.sii.cl/sobre_el_sii/gestion_y_estadisticas.html">Gesti&oacute;n y estad&iacute;sticas</a></li>
                                   <li><a href="http://www.sii.cl/sobre_el_sii/terminos_sitio_web.html">T&eacute;rminos de uso del sitio web</a></li>
                                   <li><a href="http://www.sii.cl/sobre_el_sii/recomendaciones_seguridad.htm">Recomendaciones de seguridad</a></li>
       </ul>
    </div>
			  
			</div>
			<!-- PIE MOVIL-->
			<div class='row visible-xs'>
			  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class='panel panel-default'>
       <div class='panel-heading' role='tab' id='heading01'>
          <h4 class='panel-title'>
             <a class='arrow-click collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse01' aria-expanded='true' aria-controls='collapse01'><span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span>Valores y fechas</a>
          </h4>
       </div>
       <div id='collapse01' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading01'>
          <div class='panel-body'>
             <ul class='list-unstyled'>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/uf/uf2019.htm">UF</a></li>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/dolar/dolar2019.htm">D&oacute;lar</a></li>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/utm/utm2019.htm">UTM-UTA-IPC</a></li>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/renta/datos_valores_renta.html">Datos y valores de Renta</a></li>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/iva/datos_valores_iva.html">Datos y valores de IVA</a></li>
                                   <li><a href="http://www.sii.cl/valores_y_fechas/otros_valores/otros_valores.html">Otros valores</a></li>
             </ul>
          </div>
       </div>
    </div>
    <div class='panel panel-default'>
       <div class='panel-heading' role='tab' id='heading02'>
          <h4 class='panel-title'>
             <a class='arrow-click collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse02' aria-expanded='true' aria-controls='collapse02'><span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span>Normativa y legislaci&oacute;n</a>
          </h4>
       </div>
       <div id='collapse02' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading02'>
          <div class='panel-body'>
             <ul class='list-unstyled'>
                                   <li><a href="http://www.sii.cl/normativa_legislacion/circulares/2019/indcir2019.htm">Circulares</a></li>
                                   <li><a href="http://www.sii.cl/normativa_legislacion/resoluciones/2019/res_ind2019.htm">Resoluciones</a></li>
                                   <li><a href="https://www4.sii.cl/consultaProyectosNormativosInternet/#Inicio">Consulta p&uacute;blica de normas</a></li>
                                   <li><a href="https://www3.sii.cl/normaInternet/">Administrador de contenido normativo</a></li>
                                   <li><a href="https://www4.sii.cl/acjui/internet/#/instancia/1">Administrador de Contenido de Jurisprudencia</a></li>
                                   <li><a href="http://www.sii.cl/normativa_legislacion/legislacion_tributaria.html">Legislaci&oacute;n tributaria y convenios internacionales</a></li>
                                   <li><a href="http://www.sii.cl/normativa_legislacion/jurisprudencia_y_tribunales.html">Jurisprudencia y tribunales</a></li>
             </ul>
          </div>
       </div>
    </div>
    <div class='panel panel-default'>
       <div class='panel-heading' role='tab' id='heading03'>
          <h4 class='panel-title'>
             <a class='arrow-click collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse03' aria-expanded='true' aria-controls='collapse03'><span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span>Redes sociales</a>
          </h4>
       </div>
       <div id='collapse03' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading03'>
          <div class='panel-body'>
             <ul class='list-unstyled'>
                                   <li><a href="https://www.facebook.com/impuestosinternoschile/">Facebook</a></li>
                                   <li><a href="https://twitter.com/SII_Chile">Twitter</a></li>
                                   <li><a href="https://www.youtube.com/user/sii/">Youtube</a></li>
                                   <li><a href="http://www.sii.cl/redes_sociales/rss.html">RSS</a></li>
                                   <li><a href="http://www.sii.cl/ayudas/apps/">APP&acute;s</a></li>
             </ul>
          </div>
       </div>
    </div>
    <div class='panel panel-default'>
       <div class='panel-heading' role='tab' id='heading04'>
          <h4 class='panel-title'>
             <a class='arrow-click collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse04' aria-expanded='true' aria-controls='collapse04'><span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span>Sitios de inter&eacute;s</a>
          </h4>
       </div>
       <div id='collapse04' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading04'>
          <div class='panel-body'>
             <ul class='list-unstyled'>
                                   <li><a href="http://www.sii.cl/sitios_de_interes/sinteres_appdoc.html">Aplicaciones y documentos</a></li>
                                   <li><a href="http://www.sii.cl/sitios_de_interes/sinteres_wutiles.html">Web &uacute;tiles</a></li>
                                   <li><a href="http://www.sii.cl/sitios_de_interes/sinteres_sgob.html">Sitios de gobierno relacionados</a></li>
                                   <li><a href="http://www.sii.cl/sitios_de_interes/sinteres_orgrelacionados.html">Organismos relacionados</a></li>
                                   <li><a href="http://www.sii.cl/asuntos_internacionales/">Intercambios de Informaci&oacute;n - Est&aacute;ndar CRS</a></li>
             </ul>
          </div>
       </div>
    </div>
    <div class='panel panel-default'>
       <div class='panel-heading' role='tab' id='heading05'>
          <h4 class='panel-title'>
             <a class='arrow-click collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse05' aria-expanded='true' aria-controls='collapse05'><span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span>Sobre el SII</a>
          </h4>
       </div>
       <div id='collapse05' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading05'>
          <div class='panel-body'>
             <ul class='list-unstyled'>
                                   <li><a href="http://www.sii.cl/sobre_el_sii/nuestro_servicio.htm">Nuestro Servicio</a></li>
                                   <li><a href="http://www.sii.cl/sobre_el_sii/trabaja_con_nosotros.html">Trabaja con nosotros</a></li>
                                   <li><a href="http://www.sii.cl/sobre_el_sii/gestion_y_estadisticas.html">Gesti&oacute;n y estad&iacute;sticas</a></li>
                                   <li><a href="http://www.sii.cl/sobre_el_sii/terminos_sitio_web.html">T&eacute;rminos de uso del sitio web</a></li>
                                   <li><a href="http://www.sii.cl/sobre_el_sii/recomendaciones_seguridad.htm">Recomendaciones de seguridad</a></li>
             </ul>
          </div>
       </div>
    </div>

			  </div>
			</div>

		  </div>
		</footer>
	  </div>
	  <!-- FIN PIE -->

	</div>

        <!-- Modal simple-->
   <!-- Modal -->
<div class="modal fade" id="modalAviso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onClick="cleareframe();" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body text-center">
        <!-- Image Map Generated by http://www.image-map.net/ -->
        <img src="http://homer.sii.cl/img/modal_renta_019.jpg" usemap="#image-map">

        <map name="image-map">
            <area target="_blank" alt="Ley Honorarios" title="Ley Honorarios" href="http://www.leyhonorarios.cl" coords="417,380,203,345" shape="rect">
        </map>


      <!--  <a href="http://www.leyhonorarios.cl">
          <img style="width:100%" src="http://homer.sii.cl/img/modal_renta_019.jpg" class="img-responsive"/>     
         </a>-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="$('# modalAviso).hide('show');">Cerrar</button>
      </div>
    </div>
  </div>
</div>

   <!-- Modal RCV -->
   <div class='modal fade' id='modal_rcv' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	 <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close' onClick='$("#modal_rcv").hide("show");'><span aria-hidden='true'>&times;</span></button>
	       <h4 class='modal-title text-center' id='myModalLabel'>Registro de Compras y Ventas</h4>
	      </div>
	      <div class='modal-body'>
	        <p style='text-align:justify'>Recuerde que a partir de agosto de 2017, la Informaci&oacute;n  Electr&oacute;nica de Compras y Ventas (IECV) fue reemplazada por el Registro de  Compras y Ventas (RCV) que confeccionar&aacute; el SII, con ello ya no ser&aacute; necesario  el env&iacute;o de los libros electr&oacute;nicos a partir de ese per&iacute;odo. Para m&aacute;s informaci&oacute;n visite nuestro <a href='http://www.sii.cl/destacados/f29/index.html'>Portal</a>.</p>
	      </div>
	      <div class='modal-footer'>
	        <button type='button' class='btn btn-default' data-dismiss='modal'  onClick='javascript:window.location.href="http://www.sii.cl/servicios_online/1039-1183.html#-collapseOne"'>Continuar</button>
	      </div>
	    </div>
	  </div>
   </div>
   <!-- Fin Modal RCV -->
	
	<script src='/responsive/js/general.js'></script>
	<script src='/responsive/js/functions.js'></script>
   
   <script>
      $(document).ready(function() {
         $('#carrusel_links').carousel({
            interval: 10000,
            cycle: true
         });

          //AbreModal("modalAviso");
      });
		
	   function AbreModal(par){
	      $("#"+par).modal('show');
	   }
   </script>
	
   <script src="//assets.adobedtm.com/launch-EN2b1e36bbb6d548dfa15c1b55cb71b120.min.js"></script>
			
  </body>
</html>

