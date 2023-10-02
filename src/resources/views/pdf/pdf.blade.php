<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bitácora de Máquina</title>
    <style>

  * {
  margin: 0;
}

      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        font-size: 14px;
      }

      .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;


      }

      .header {
        border: #6A6462 1px solid;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 5px;
       /* background-color: #002E5D;
        color: white;*/
        height: 64px;
      }


        #header_izquierda{
         /*   border: 1px solid;*/
            width: 250px;
            float: left;
        }

        #header_derecha{
            border: 1px solid;
            width: 390px;
            float: right;
        }


      .header img {

        padding-top: 10px;
        height: 26px;
      }

      .title-folio {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .title {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
      }

      .folio {
        margin: 0;
        font-size: 12px;
        font-weight: bold;
      }

      .company {
        margin: 0;
        font-size: 10px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 2px;
        font-size: 8px;
      }






      th, td {
        padding: 2px;
        text-align: center;
        border: 1px solid #ddd;
      }

      th {
        background-color: #f2f2f2;
        font-weight: bold;
      }

      .title-table {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
      }


      .subtitle-table {
        font-size: 12px;
        font-weight: bold;
        margin-bottom: 10px;
      }

      .titlesub-table {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
      }



      .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-column-gap: 20px;
    }

  #control_hora_servicios{

    height: 130px; /* Altura deseada */
    max-width: 800px;
   /* background:red;*/

  }

    #controldeinsumos{
      /* border: 1px solid;*/
        max-width: 550px;
        float: left;

       /* background: GREEN;*/
    }

    #motor_principal_y_cm{
       /* border: 1px solid;*/
        padding-left: 10px;
        float: right;
        max-width: 800px;
      /*  background: blue;   */
    }





    #Contenedor_motor_auxiliares {
  height: 120px;
  max-width: 800px;
  /*background: orange;*/
  display: grid;
 /* grid-template-columns: repeat(1, 1fr);
  grid-gap: 10px;*/
}



#motor_aux {
 /* background: pink;*/
  width: 180px;
  height: 130px;
  float:left;
  justify-content: center; /* Centrado horizontal */
  align-items: center; /* Centrado vertical */
}


    #control_hora_servicios{
    height: 108px; /* Altura deseada */
    max-width: 800px;
    margin-TOP: 10px;


    }


    #motorprincipal{

      float: left;
      /* border: 1px solid;*/
      /* background: red;*/
       width: 455px;
       margin-right: 8px;
    }



    #motorprincipal2{
       float: right;
      /* border: 1px solid;*/
       /*background: red;*/
       width: 190px;
    }


    #div_motores_principales{

      /* border: 1px solid;*/
     /*  background: blue;*/
       max-width: 800px;
       height: 140px; /* Altura deseada */
    }

  #div_linea_contra_marcha{


     /*border: 1px solid;*/
      /* background: GREEN;*/
       max-width: 800px;
       height: 140px; /* Altura deseada */

  }

  #div_motores_auxiliares_babor_y_estribor{


/*border: 1px solid;*/
 /* background: yellow;*/
  max-width: 800px;
  height: 140px; /* Altura deseada */

}

  #contra_marcha{
    float: left;
     /* border: 1px solid;*/
     /*  background: orange;*/
       max-width: 165px;
      /* height: 150px; /* Altura deseada */

  }


  #contenedor_hytek{
    float: right;
     /* border: 1px solid;*/
      /* background: blue;*/
       max-width: 165px;
      /* height: 150px; /* Altura deseada */

  }



  #m_aux_babor{

    float: left;
     /* border: 1px solid;*/
      /* background: red;*/
       width: 280px;
      /* height: 150px; /* Altura deseada */
      /* margin-left: 5px;*/
  }

  #m_aux_estribor{

        float: right;
      /*  border: 1px solid;*/
      /*  background: pink;*/
        width: 280px;
        /*height: 150px; /* Altura deseada */

  }


  #div_fila_estado_equipo_y_alarma{


   /* border: 1px solid;*/
   /* background: pink;*/
    width: 660px;
    height: 110px; /* Altura deseada */

    }
.spa_controlinsumo{
  width: 49px;
}
.spa_controlinsumo2{
  width: 60px;
}

.spa_motor_principaycm{
  width: 30px;
}
.table_aauxestribor{
  width: 30px;
}
.table_filas_aauxestribor{

  height: 9px;
}

.campo_estado_de_equipo_alarma{
  width: 70px;
}
.firma-linea {
  text-align: center;
  float: right;
  width: 230px; /* Ancho de la línea */
  height: 1px; /* Grosor de la línea */
  background-color: black; /* Color de la línea */
  margin-top: 10px; /* Espacio superior para separar de otros elementos */
  margin-bottom: 10px; /* Espacio inferior para separar de otros elementos */
  font-size: 12px
}

.maux_fecha{width: 40px;}
.maux_horometro{width: 20px;}

.maux_tipos{ width: 55px;  /*background-color: red;*/}
#maux_espacio{width: 11px; /* background-color: red;*/ float: left;
      }
#mpcm_contenedor_hmp{width: 125px;  /*background-color: red;*/}
#mpcm_contenedor_hmp2{width: 140px;  /*background-color: red;*/}
.firma_nombre{font-size: 10px; text-align: center;}
.mantenedor_titulo_sistema{width: 120px;}
.mantenedor_titulo_sistema2{width: 100px;}
.mantenedor_titulo_sistema3{width: 110px;}
.mantenedor_titulo_sistema4{width: 100px;}
.mprincipal_1{width: 50px;}
.mprincipal_2{width: 50px;}
.mprincipal_3{width: 50px;}
.mprincipal_4{width: 55px;}
.mprincipal_5{width: 40px;}
.mprincipal_6{width: 50px;}
.mprincipal_7{width: 58px;}
.mprincipal_8{width: 65px;}
.mprincipal_9{width: 70px;}
.mprincipal_10{width: 50px;}
.mprincipal_11{width: 55px;}
.mprincipal_12{width: 59px;}
.texto_obs{ border: #6A6462 1px solid;width:100%;  font-size: 10px;}
.subtitle-table {
  margin: 0;
  padding: 0;
}


    </style>
  </head>
  <body>

    <div class="container">
      <header class="header">
        <div id="header_izquierda">

                <div class="title-folio">
                    <div class="title">
                        <img src="{{ public_path('Camanchaca.png') }}" alt="Logo de la empresa">Bitácora de Máquina
                        {{-- <img src="{{ public_path('Camanchaca.png') }}"> --}}
                    </div>
                    <div class="company">Camanchaca S.A. Flota Iquique</div>
                    <div class="folio">Folio: {{$bitacora[0]->folio}}</div>

                </div>
        </div>
        <div id="header_derecha">
                    <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">P.A.M</th>
                              <th scope="col">Fecha  Zarpe</th>
                              <th scope="col">Hora Navegacion</th>
                              <th scope="col">Motorista 1</th>

                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>{{$bitacora[0]->pam}}</td>
                              <td>{{$bitacora[0]->fecha_zarpe}}</td>
                              <td>{{$bitacora[0]->horas_navegac}}</td>
                              <td>{{$bitacora[0]->motorista}}</td>

                            </tr>
                          </tbody>
                          <thead>
                            <tr>
                            <td></td>

                              <th scope="col">Fecha Recalada </th>
                              <th scope="col">Horas Operación</th>


                              <th scope="col">Motorista 2</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td>{{$bitacora[0]->fecha_recalada}}</td>
                              <td>{{$bitacora[0]->horas_operac}}</td>
                              <td>{{$bitacora[0]->motorista2}}</td>

                            </tr>
                          </tbody>
                    </table>
        </div>
      </header>


      <h1 class="subtitle-table">CONTROL HORAS DE SERVICIOS</h1>
<div id="control_hora_servicios">
   <div id="controldeinsumos">
    <h1 class="subtitle-table">Control de insumos</h1>
        <table class="table table-bordered">
    <thead>
        <tr>
        <th class="spa_controlinsumo" scope="col">Insumo</th>
        <th class="spa_controlinsumo" scope="col">Stock Zarpe</th>
        <th class="spa_controlinsumo2" scope="col" >Stock Recalada</th>
        <th class="spa_controlinsumo" scope="col">Consumo</th>

        <th class="spa_controlinsumo" scope="col">Pedidos Lts.</th>
        <th class="spa_controlinsumo2" scope="col">Numero Guía </th>


        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">Petroleo</th>
        <td >{{$controldeinsumo[0]->petro_stock_zar ?? ''}}</td>
        <td>{{$controldeinsumo[0]->petro_stock_rec ?? ''}}</td>
        <td>{{$controldeinsumo[0]->petro_consumo ?? ''}}</td>
        <td>{{$controldeinsumo[0]->petro_pedido_lts ?? ''}}</td>
        <td>{{$controldeinsumo[0]->petro_guia ?? ''}}</td>


        </tr>
        <tr>
        <th scope="row">Aceite Motor</th>
        <td>{{$controldeinsumo[0]->aceitemotor_stock_zar ?? ''}}</td>
        <td>{{$controldeinsumo[0]->aceite_motor_stock_rec ?? ''}}</td>
        <td>{{$controldeinsumo[0]->aceite_motor_consumo ?? ''}}</td>
        <td>{{$controldeinsumo[0]->aceite_motor_pedido_lts ?? ''}}</td>
        <td>{{$controldeinsumo[0]->aceite_motor_guia ?? ''}}</td>


        </tr>

        <tr>
        <th scope="row">Aceite HID</th>
        <td>{{$controldeinsumo[0]->aceite_hid_stock_zar ?? ''}}</td>
        <td>{{$controldeinsumo[0]->aceite_hid_stock_rec ?? ''}}</td>
        <td>{{$controldeinsumo[0]->aceite_hid_consumo ?? ''}}</td>
        <td>{{$controldeinsumo[0]->aceite_hid_stock_pedido_lts ?? ''}}</td>
        <td>{{$controldeinsumo[0]->aceite_hid_guia ?? ''}}</td>


        </tr>
        <tr>
        <th scope="row">Grasa</th>
        <td>{{$controldeinsumo[0]->grasa_stock_zar ?? ''}}</td>
        <td>{{$controldeinsumo[0]->grasa_stock_rec ?? ''}}</td>
        <td>{{$controldeinsumo[0]->grasa_consumo ?? ''}}</td>
        <td>{{$controldeinsumo[0]->grasa_pedido ?? ''}}</td>
        <td>{{$controldeinsumo[0]->grasa_guia ?? ''}}</td>


        </tr>
    </tbody>
    </table>
</div>



<div id="motor_principal_y_cm">
    <h1 class="subtitle-table">Motor Principal, Contra Marcha, Hytek (Horómetro)</h1>
        <table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col" id="mpcm_contenedor_hmp">Horas M.P. Zarpe</th>
        <td class="spa_motor_principaycm">{{$motor_principal_y_cm[0]->horasmotor_principal_zarpe ?? ''}}</td>


        <th scope="col" id="mpcm_contenedor_hmp2">Horas M.P. Recalada</th>
        <td class="spa_motor_principaycm">{{$motor_principal_y_cm[0]->horasmotor_principal_recalada ?? ''}}</td>


        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="col">Motor Principal / Aceite</th>
        <td>{{$tabla_de_cambios[0]->horometro_mp_aceite ?? ''}}</td>
        <th scope="col">Motor Principal / Filtro Combustible</th>
        <td>{{$tabla_de_cambios[0]->horometro_mp_filtro_combustible ?? ''}}</td>


        </tr>
        <tr>
        <th scope="col">Motor Principal / Filtro Aceite</th>
        <td>{{$tabla_de_cambios[0]->horometro_mp_filtro_aceite ?? ''}}</td>
        <th scope="col">Motor Principal / Filtro Racor</th>
        <td>{{$tabla_de_cambios[0]->horometro_mp_filtro_racor ?? ''}}</td>

        </tr>
        <tr>
        <th scope="col">Motor Principal / Filtro Aire</th>
        <td>{{$tabla_de_cambios[0]->horometro_mp_filtro_aire ?? ''}}</td>
        <th scope="col">Contra Marcha / Aceite</th>
        <td>{{$tabla_de_cambios[0]->horometro_cm_aceite ?? ''}}</td>

        </tr>

        <tr>
          <th scope="col">Contra Marcha / Filtro Aceite</th>
          <td>{{$tabla_de_cambios[0]->horometro_cm_filtro_aceite ?? ''}}</td>
          <th scope="col">Hytek / Aceite</th>
          <td>{{$tabla_de_cambios[0]->horometro_hy_aceite ?? ''}}</td>

        </tr>
        <tr>
          <th scope="col">Hytek / Filtro Aceite</th>
          <td>{{$tabla_de_cambios[0]->horometro_hy_filtro_aceite ?? ''}}</td>


        </tr>
    </tbody>
    </table>
</div>




</div> <!-- fon del contenedor del control de insumos y motor principal y cm-->



<div id="Contenedor_motor_auxiliares">

  @for ($i = 0; $i < $rango; $i++)



      <div id="motor_aux">
          <h1 class="subtitle-table">Motor Auxiliar {{$i+1}}</h1>
              <table class="table table-bordered">
          <thead>
              <tr>

              <th scope="col" class="maux_tipos">




              </th>
              <th scope="col" class="maux_horometro">Horómetro  {{$motores_aux[$i]->numero_motor_aux ?? ''}} </th>



              </tr>
          </thead>
          <tbody>
              <tr>
                  <th scope="col">Horas M/Aux 1  Zarpe    </th>
                  <td> {{ $motores_aux[$i]->horas_ma_zarpe ?? ''}}  </td>
              </tr>
              <tr>
                  <th scope="col">Horas M/Aux 1  Recalada   </th>
                  <td> {{ $motores_aux[$i]->horas_ma_recalada ?? ''}}  </td>
              </tr>
              <tr>
                  <th scope="col">Aceite   </th>
                  <td> {{ $tablacambio_motoresaux[$i]->horometro_Aceite ?? ''}}  </td>
              </tr>
              <tr>
                <th scope="col">Filtro Aceite</th>
                <td>{{$tablacambio_motoresaux[$i]->horometro_filtro_aceite ?? ''}}</td>

              </tr>
              <tr>
                <th scope="col">Filtro Combustible</th>
                  <td>{{$tablacambio_motoresaux[$i]->horometro_fitro_combustible ?? ''}}</td>

              </tr>

              <tr>
                <th scope="col">Filtro Racor</th>
                  <td>{{$tablacambio_motoresaux[$i]->horometro_filtro_racor ?? ''}}</td>

              </tr>


              <tr>
                <th scope="col">Filtro Aire</th>
                  <td>{{$tablacambio_motoresaux[$i]->horometro_filtro_aire ?? ''}}</td>

              </tr>

          </tbody>
          </table>
        </div>
        <div id="maux_espacio"></div>


        @endfor

  </div><!--Fin div Contenedor_motor_auxiliares -->



<br>
<h1 class="subtitle-table">CONTROL DE OPERACION</h1>
<div id="div_motores_principales">

    <div id="motorprincipal">
          <h1 class="subtitle-table">Motor Principal</h1>
            <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" >Guardia</th>
            <th scope="col" class="mprincipal_1">R.P.M</th>
            <th scope="col" class="mprincipal_2">Nivel Aceite</th>
            <th scope="col" class="mprincipal_3">Relleno</th>
            <th scope="col" class="mprincipal_4">Presión Aceite</th>
            <th scope="col" class="mprincipal_5">Temperatura Aceite </th>
            <th scope="col" class="mprincipal_6">Voltaje Batería</th>
            <th scope="col" class="mprincipal_7">Temperatura Escape Babor</th>
            <th scope="col" class="mprincipal_8">Temperatura Escape Estribor</th>
            <th scope="col" class="mprincipal_9">Temperatura Admisión General</th>

            <th scope="col" class="mprincipal_10">Presión Aire</th>
            <th scope="col" class="mprincipal_11">Presión Agua</th>
            <th scope="col" class="mprincipal_12">Presión Combustible</th>




          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">00-04</th>
            <td>{{$motor_principal[0]->rpm_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->naceite_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->relleno_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aceite_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_aceite_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->voltaje_bateria_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_babor_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_estribor_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_admision_general_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aire_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_agua_0004 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_combustible_0004 ?? ''}}</td>

          </tr>
          <tr>
            <th scope="row">04-08</th>
            <td>{{$motor_principal[0]->rpm_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->naceite_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->relleno_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aceite_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_aceite_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->voltaje_bateria_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_babor_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_estribor_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_admision_general_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aire_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_agua_0408 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_combustible_0408 ?? ''}}</td>
          </tr>
          <tr>
            <th scope="row">08-12</th>
            <td>{{$motor_principal[0]->rpm_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->naceite_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->relleno_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aceite_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_aceite_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->voltaje_bateria_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_babor_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_estribor_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_admision_general_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aire_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_agua_0812 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_combustible_0812 ?? ''}}</td>
          </tr>
          <tr>
            <th scope="row">12-16</th>
            <td>{{$motor_principal[0]->rpm_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->naceite_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->relleno_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aceite_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_aceite_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->voltaje_bateria_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_babor_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_estribor_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_admision_general_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aire_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_agua_1216 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_combustible_1216 ?? ''}}</td>
          </tr>
          <tr>
            <th scope="row">16-20</th>
            <td>{{$motor_principal[0]->rpm_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->naceite_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->relleno_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aceite_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_aceite_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->voltaje_bateria_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_babor_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_estribor_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_admision_general_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aire_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_agua_1620 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_combustible_1620 ?? ''}}</td>
          </tr>
          <tr>
            <th scope="row">20-24</th>
            <td>{{$motor_principal[0]->rpm_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->naceite_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->relleno_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aceite_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_aceite_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->voltaje_bateria_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_babor_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_escape_estribor_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->temperatura_admision_general_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_aire_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_agua_2024 ?? ''}}</td>
            <td>{{$motor_principal[0]->presion_combustible_2024 ?? ''}}</td>
          </tr>
        </tbody>
      </table>

    </div>

</div> <!-- fin div_motores_principales-->

      <div id="div_linea_contra_marcha">


          <div id="contra_marcha">
                <h1 class="subtitle-table">Contra Marcha</h1>
                  <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Guardia</th>
                  <th scope="col">Nivel Aceite</th>
                  <th scope="col">Presión Aceite</th>
                  <th scope="col">Temperatura Aceite</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">00-04</th>
                  <td>{{$contra_marcha[0]->naceite_0004 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->paceite_0004 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->aceite_0004 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">04-08</th>
                  <td>{{$contra_marcha[0]->naceite_0408 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->paceite_0408 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->aceite_0408 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">08-12</th>
                  <td>{{$contra_marcha[0]->naceite_0812 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->paceite_0812 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->aceite_0812 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">12-16</th>
                  <td>{{$contra_marcha[0]->naceite_1216 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->paceite_1216 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->aceite_1216 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">16-20</th>
                  <td>{{$contra_marcha[0]->naceite_1620 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->paceite_1620 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->aceite_1620 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">20-24</th>
                  <td>{{$contra_marcha[0]->naceite_2024 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->paceite_2024 ?? ''}}</td>
                  <td>{{$contra_marcha[0]->aceite_2024 ?? ''}}</td>
                </tr>
              </tbody>
            </table>
          </div>


           <div id="contenedor_hytek">
                <h1 class="subtitle-table">Hytek</h1>
                  <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Guardia</th>
                  <th scope="col">Nivel Aceite</th>
                  <th scope="col">Presión Aceite</th>
                  <th scope="col">Temperatura Aceite</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">00-04</th>
                  <td>{{$Hyteks[0]->naceite_0004 ?? ''}}</td>
                  <td>{{$Hyteks[0]->paceite_0004 ?? ''}}</td>
                  <td>{{$Hyteks[0]->aceite_0004 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">04-08</th>
                  <td>{{$Hyteks[0]->naceite_0408 ?? ''}}</td>
                  <td>{{$Hyteks[0]->paceite_0408 ?? ''}}</td>
                  <td>{{$Hyteks[0]->aceite_0408 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">08-12</th>
                  <td>{{$Hyteks[0]->naceite_0812 ?? ''}}</td>
                  <td>{{$Hyteks[0]->paceite_0812 ?? ''}}</td>
                  <td>{{$Hyteks[0]->aceite_0812 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">12-16</th>
                  <td>{{$Hyteks[0]->naceite_1216 ?? ''}}</td>
                  <td>{{$Hyteks[0]->paceite_1216 ?? ''}}</td>
                  <td>{{$Hyteks[0]->aceite_1216 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">16-20</th>
                  <td>{{$Hyteks[0]->naceite_1620 ?? ''}}</td>
                  <td>{{$Hyteks[0]->paceite_1620 ?? ''}}</td>
                  <td>{{$Hyteks[0]->aceite_1620 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">20-24</th>
                  <td>{{$Hyteks[0]->naceite_2024 ?? ''}}</td>
                  <td>{{$Hyteks[0]->paceite_2024 ?? ''}}</td>
                  <td>{{$Hyteks[0]->aceite_2024 ?? ''}}</td>
                </tr>
              </tbody>
            </table>
          </div>
      </div> <!--   fin <div id="div_linea_contra_marcha">-->



      <div id="div_motores_auxiliares_babor_y_estribor">
      <div id="m_aux_estribor">
                <h1 class="subtitle-table">Motor Auxiliar Estribor</h1>
                <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" style="width: 38px">Guardia</th>
                  <th scope="col" style="width: 38px">Nivel Aceite</th>
                  <th scope="col" style="width: 38px">Temperatura Aceite</th>
                  <th scope="col" style="width: 38px">Voltaje</th>
                  <th scope="col" style="width: 38px">Amperaje</th>
                  <th scope="col" style="width: 38px">Ciclos (hz)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">00-04</th>
                  <td>{{  $a_aux_estribor[0]->naceite_0004 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->taceite_0004 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->volt_0004 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->amp_0004 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->ciclos_0004 ?? ''}}</td>

                </tr>
                <tr>
                  <th scope="row">04-08</th>
                  <td>{{  $a_aux_estribor[0]->naceite_0408 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->taceite_0408 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->volt_0408 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->amp_0408 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->ciclos_0408 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">08-12</th>
                  <td>{{  $a_aux_estribor[0]->naceite_0812 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->taceite_0812 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->volt_0812 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->amp_0812 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->ciclos_0812 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">12-16</th>
                  <td>{{  $a_aux_estribor[0]->naceite_1216 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->taceite_1216 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->volt_1216 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->amp_1216 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->ciclos_1216 ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">16-20</th>
                  <td>{{  $a_aux_estribor[0]->naceite_1620 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->taceite_1620 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->volt_1620  ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->amp_1620  ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->ciclos_1620  ?? ''}}</td>
                </tr>
                <tr>
                  <th scope="row">20-24</th>
                  <td>{{  $a_aux_estribor[0]->naceite_2024 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->taceite_2024 ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->volt_2024  ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->amp_2024  ?? ''}}</td>
                  <td>{{  $a_aux_estribor[0]->ciclos_2024  ?? ''}}</td>
                </tr>
              </tbody>
            </table>

          </div>


          <div id="m_aux_babor">
            <h1 class="subtitle-table">Motor Auxiliar Babor </h1>
              <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" style="width: 38px">Guardia</th>
              <th scope="col" style="width: 38px">Nivel Aceite</th>
              <th scope="col" style="width: 38px">Temperatura Aceite</th>
              <th scope="col" style="width: 38px">Voltaje</th>
              <th scope="col" style="width: 38px">Amperaje</th>
              <th scope="col" style="width: 38px">Ciclos (hz)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">00-04</th>
              <td>{{$m_aux_babor[0]->naceite_0004 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->paceite_0004 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->volt_0004 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->amp_0004 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->ciclos_0004 ?? ''}}</td>

            </tr>
            <tr>
              <th scope="row">04-08</th>
              <td>{{$m_aux_babor[0]->naceite_0408 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->paceite_0408 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->volt_0408 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->amp_0408 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->ciclos_0408 ?? ''}}</td>
            </tr>
            <tr>
              <th scope="row">08-12</th>
              <td>{{$m_aux_babor[0]->naceite_0812 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->paceite_0812 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->volt_0812 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->amp_0812 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->ciclos_0812 ?? ''}}</td>
            </tr>
            <tr>
              <th scope="row">12-16</th>
              <td>{{$m_aux_babor[0]->naceite_1216 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->paceite_1216 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->volt_1216 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->amp_1216 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->ciclos_1216 ?? ''}}</td>
            </tr>
            <tr>
              <th scope="row">16-20</th>
              <td>{{$m_aux_babor[0]->naceite_1620 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->paceite_1620 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->volt_1620  ?? ''}}</td>
              <td>{{$m_aux_babor[0]->amp_1620  ?? ''}}</td>
              <td>{{$m_aux_babor[0]->ciclos_1620  ?? ''}}</td>
            </tr>
            <tr>
              <th scope="row">20-24</th>
              <td>{{$m_aux_babor[0]->naceite_2024 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->paceite_2024 ?? ''}}</td>
              <td>{{$m_aux_babor[0]->volt_2024  ?? ''}}</td>
              <td>{{$m_aux_babor[0]->amp_2024  ?? ''}}</td>
              <td>{{$m_aux_babor[0]->ciclos_2024  ?? ''}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      </div> <!--fin       div_motores_auxiliares_babor_y_estribor -->

      <div id="div_fila_estado_equipo_y_alarma">


      <h1 class="subtitle-table">Estado de equipo y alarma</h1>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"class="mantenedor_titulo_sistema">SISTEMA ELECTRONICO</th>
      <th scope="col" class="campo_estado_de_equipo_alarma"></th>
      <th scope="col" class="mantenedor_titulo_sistema2">EQUIPO DE PESCA</th>
      <th scope="col" class="campo_estado_de_equipo_alarma"></th>
      <th scope="col" class="mantenedor_titulo_sistema3">VARIOS</th>
      <th scope="col" class="campo_estado_de_equipo_alarma"></th>
      <th scope="col" class="mantenedor_titulo_sistema4">ALARMA</th>
      <th scope="col" class="campo_estado_de_equipo_alarma"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Alternador Motor Principal</th>
      <td >{{$estados_de_equipo_y_alarma[0]->alternador_mp ?? ''}}</td>
      <th scope="row">Bomba De Pescado</th>
      <td>{{$estados_de_equipo_y_alarma[0]->bba_pescado ?? ''}}</td>


      <th scope="row">Gobierno</th>
      <td>{{$estados_de_equipo_y_alarma[0]->gobierno ?? ''}}</td>

      <th scope="row">Racel</th>
      <td>{{$estados_de_equipo_y_alarma[0]->racel ?? ''}}</td>


    </tr>
    <tr>
    <th scope="row">Alternador Motor Auxiliar</th>
      <td>{{$estados_de_equipo_y_alarma[0]->alternador_ma ?? ''}}</td>
      <th scope="row">Winche</th>
      <td>{{$estados_de_equipo_y_alarma[0]->winche ?? ''}}</td>

      <th scope="row">Propulsión</th>
      <td>{{$estados_de_equipo_y_alarma[0]->propulsion ?? ''}}</td>

      <th scope="row">	Sentina</th>
      <td>{{$estados_de_equipo_y_alarma[0]->sentina ?? ''}}</td>
    </tr>
    <tr>
    <th scope="row">Luces</th>
      <td>{{$estados_de_equipo_y_alarma[0]->luces ?? ''}}</td>
      <th scope="row">Net Winch	</th>
      <td>{{$estados_de_equipo_y_alarma[0]->anet_winch ?? ''}}</td>

      <th scope="row">Bomba De Achique</th>
      <td>{{$estados_de_equipo_y_alarma[0]->bra_archique ?? ''}}</td>

      <th scope="row">	Presión motor principal</th>
      <td>{{$estados_de_equipo_y_alarma[0]->p_mp ?? ''}}</td>
    </tr>


    <th scope="row">Baterias</th>
      <td>{{$estados_de_equipo_y_alarma[0]->baterias ?? ''}}</td>
      <th scope="row">Net Stacker	</th>
      <td>{{$estados_de_equipo_y_alarma[0]->net_stacker ?? ''}}</td>

      <th scope="row">Estanques</th>
      <td>{{$estados_de_equipo_y_alarma[0]->estanque ?? ''}}</td>
      <th scope="row">		Temperatura motor principal</th>
      <td>{{$estados_de_equipo_y_alarma[0]->t_mp ?? ''}}</td>
    </tr>



  </tbody>
</table>

      </div>




      <div id="div_obs">
                <h1 class="subtitle-table">OBSERVACIÓN - TRABAJOS - PEDIDOS</h1>
                 <P class="texto_obs">{{$bitacora[0]->obs}}</P>

      </div>
      <br>
      <div class="firma-linea"> Firma Motorista<br><p class="firma_nombre">{{$bitacora[0]->motorista}}</p> </div>

    </div>



  </body>
</html>
