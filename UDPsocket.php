<?php


///////////////////////////////////////////////////////////////////////////////
////////////constantes para la comunicacion UDP///////////////////////////////
/////////////////////////////////////////////////////////////////////////////
 $mbufintCRCTable =[
		0x0000, 0x1021, 0x2042, 0x3063, 0x4084, 0x50a5, 0x60c6, 0x70e7,
		0x8108, 0x9129, 0xa14a, 0xb16b, 0xc18c, 0xd1ad, 0xe1ce, 0xf1ef,
		0x1231, 0x0210, 0x3273, 0x2252, 0x52b5, 0x4294, 0x72f7, 0x62d6,
		0x9339, 0x8318, 0xb37b, 0xa35a, 0xd3bd, 0xc39c, 0xf3ff, 0xe3de,
		0x2462, 0x3443, 0x0420, 0x1401, 0x64e6, 0x74c7, 0x44a4, 0x5485,
		0xa56a, 0xb54b, 0x8528, 0x9509, 0xe5ee, 0xf5cf, 0xc5ac, 0xd58d,
		0x3653, 0x2672, 0x1611, 0x0630, 0x76d7, 0x66f6, 0x5695, 0x46b4,
		0xb75b, 0xa77a, 0x9719, 0x8738, 0xf7df, 0xe7fe, 0xd79d, 0xc7bc,
		0x48c4, 0x58e5, 0x6886, 0x78a7, 0x0840, 0x1861, 0x2802, 0x3823,
		0xc9cc, 0xd9ed, 0xe98e, 0xf9af, 0x8948, 0x9969, 0xa90a, 0xb92b,
		0x5af5, 0x4ad4, 0x7ab7, 0x6a96, 0x1a71, 0x0a50, 0x3a33, 0x2a12,
		0xdbfd, 0xcbdc, 0xfbbf, 0xeb9e, 0x9b79, 0x8b58, 0xbb3b, 0xab1a,
		0x6ca6, 0x7c87, 0x4ce4, 0x5cc5, 0x2c22, 0x3c03, 0x0c60, 0x1c41,
		0xedae, 0xfd8f, 0xcdec, 0xddcd, 0xad2a, 0xbd0b, 0x8d68, 0x9d49,
		0x7e97, 0x6eb6, 0x5ed5, 0x4ef4, 0x3e13, 0x2e32, 0x1e51, 0x0e70,
		0xff9f, 0xefbe, 0xdfdd, 0xcffc, 0xbf1b, 0xaf3a, 0x9f59, 0x8f78,
		0x9188, 0x81a9, 0xb1ca, 0xa1eb, 0xd10c, 0xc12d, 0xf14e, 0xe16f,
		0x1080, 0x00a1, 0x30c2, 0x20e3, 0x5004, 0x4025, 0x7046, 0x6067,
		0x83b9, 0x9398, 0xa3fb, 0xb3da, 0xc33d, 0xd31c, 0xe37f, 0xf35e,
		0x02b1, 0x1290, 0x22f3, 0x32d2, 0x4235, 0x5214, 0x6277, 0x7256,
		0xb5ea, 0xa5cb, 0x95a8, 0x8589, 0xf56e, 0xe54f, 0xd52c, 0xc50d,
		0x34e2, 0x24c3, 0x14a0, 0x0481, 0x7466, 0x6447, 0x5424, 0x4405,
		0xa7db, 0xb7fa, 0x8799, 0x97b8, 0xe75f, 0xf77e, 0xc71d, 0xd73c,
		0x26d3, 0x36f2, 0x0691, 0x16b0, 0x6657, 0x7676, 0x4615, 0x5634,
		0xd94c, 0xc96d, 0xf90e, 0xe92f, 0x99c8, 0x89e9, 0xb98a, 0xa9ab,
		0x5844, 0x4865, 0x7806, 0x6827, 0x18c0, 0x08e1, 0x3882, 0x28a3,
		0xcb7d, 0xdb5c, 0xeb3f, 0xfb1e, 0x8bf9, 0x9bd8, 0xabbb, 0xbb9a,
		0x4a75, 0x5a54, 0x6a37, 0x7a16, 0x0af1, 0x1ad0, 0x2ab3, 0x3a92,
		0xfd2e, 0xed0f, 0xdd6c, 0xcd4d, 0xbdaa, 0xad8b, 0x9de8, 0x8dc9,
		0x7c26, 0x6c07, 0x5c64, 0x4c45, 0x3ca2, 0x2c83, 0x1ce0, 0x0cc1,
		0xef1f, 0xff3e, 0xcf5d, 0xdf7c, 0xaf9b, 0xbfba, 0x8fd9, 0x9ff8,
		0x6e17, 0x7e36, 0x4e55, 0x5e74, 0x2e93, 0x3eb2, 0x0ed1, 0x1ef0
];
 

$arraySend= array();
$arrayPackCRC=array();
$tamaño_paquete=array();
global $L_CRC;
global $H_CRC;


//llenamos los datos del encabezado para la trama udp
          global $arraySend; 
         $arraySend[4]=0x48; //H
          $arraySend[5]=0x44; //D          
          $arraySend[6]=0x4C; //L          
          $arraySend[7]=0x4D; //M         
          $arraySend[8]=0x49; //I          
          $arraySend[9]=0x52; //R          
         $arraySend[10]=0x41;//A          
         $arraySend[11]=0x43;//C
         $arraySend[12]=0x4C;//L
         $arraySend[13]=0x45;//E
         $arraySend[14]=0xAA;
         $arraySend[15]=0xAA;
          
           

////////////////////////////////////////////////////////////////////////////////////////
///////////////// codigo para realizar la comuniacacion UDP////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////


function getIP(){
    global $arraySend; 
    
    $exec = exec("hostname"); 
            $hostname = trim($exec); 
            $ip = gethostbyname($hostname);
           
             $Strip =strval($ip); 
           $ipInfo=preg_split('[\.]', $Strip);
           $a=  intval($ipInfo[0]);
           $b=intval($ipInfo[1]);
           $c=intval($ipInfo[2]);
           $d=intval($ipInfo[3]);
           
           
        
           //////completamos el encabezado del UDP////           
           $arraySend[0]=$a;
           $arraySend[1]=$b;
           $arraySend[2]=01;
           $arraySend[3]=23;
           
           

           
           
                       // retorno la ip local
           return $ip;
           
          
}


//////////////////////////////////////////////////////////////////////////////////
/////////////////////////// calculo de CRC //////////////////////////////////////
 function PackCRC($arrayBuf,$shortLenOfBuf)
	{
                  global $mbufintCRCTable;
                  global $L_CRC;
                  global $H_CRC;
	   	    $shortCRC=0; // tipo short
	   	    $bytTMP=0; // tipo byte
	   	    $shortIndexOfBuf=0;
	   	    $byteIndex_Of_CRCTable=decbin(0);  // tipo byte
                    $desplazar=8;
			while ($shortLenOfBuf!=0) 
			{
                            
				$bytTMP=($shortCRC >> $desplazar) ;    //>>: right move bit    
                               
				$shortCRC=($shortCRC << $desplazar);   //<<: left  move bit 
                                $shortCRC=  ($shortCRC & 0x00ffff);
                               $byteIndex_Of_CRCTable=($bytTMP ^ $arrayBuf[$shortIndexOfBuf]);
                         	$shortCRC=($shortCRC ^ $mbufintCRCTable[($byteIndex_Of_CRCTable & 0xFF)]);   //^: xor
                          	$shortIndexOfBuf= ($shortIndexOfBuf+1);
                            $shortLenOfBuf=($shortLenOfBuf-1);
			}
			         
			 $H_CRC=($shortCRC >> 8);
			 $shortIndexOfBuf=($shortIndexOfBuf+1);
			$L_CRC=($shortCRC & 0x00FF);    
                        
                      //  echo ("CRC: ".dechex($H_CRC).dechex($L_CRC)."<br>");
	}
 // funcion para chequear el CRC.
       
function GetCRC($arrayBuf){
    global $mbufintCRCTable;
            $strCRC2byte="";
            
           $byteH; $byteL;
           $shortCRC=0;
	   $bytTMP=0;
	   $shortIndexOfBuf=0;
	   $byteIndex_Of_CRCTable=0;
           $intLenOfBuf=count($arrayBuf);
			while (intLenOfBuf!=0) 
			{
			$bytTMP=($shortCRC >> 8) ;    //>>: right move bit   byte                           
			$shortCRC=($shortCRC << 8);   //<<: left  move bit   
                        $shortCRC=  ($shortCRC & 0x00ffff);
			$byteIndex_Of_CRCTable=($bytTMP ^ $arrayBuf[$shortIndexOfBuf]);
			$shortCRC=($shortCRC ^ $mbufintCRCTable[($byteIndex_Of_CRCTable & 0xFF)]);   //^: xor
			$shortIndexOfBuf=($shortIndexOfBuf+1);
			$intLenOfBuf=($intLenOfBuf-1);
                        };
                        $byteH=($shortCRC >> 8);
                        $byteL=($shortCRC & 0x00FF);
                        $strCRC2byte=dechex($shortCRC & 0xFFFF);//.toUpperCase();  ==> convertir a mayusculas
                      
                        switch(count($strCRC2byte))
                        {
                            case 1:
                            {
                                $strCRC2byte="000".$strCRC2byte;
                                break;
                            }
                             case 2:
                            {
                                $strCRC2byte="00".$strCRC2byte;
                                break;
                            }
                             case 3:
                            {
                                $strCRC2byte="0".$strCRC2byte;
                                break;
                            }
                             default:
                             {
                             break;
                             }
                        }
            //echo("CRC: ".$strCRC2byte);
                        return $strCRC2byte;
            
       }
       
       
       //verificar q el crc este correcto
               
function CheckCRC($arrayBuf,$intlength)
	{
global $mbufintCRCTable;		
    $blnIsCorrenct=false;
		
		$shortCRC=0;
	   	$bytTMP=0;
	   	$shortIndexOfBuf=0;
	   	$byteIndex_Of_CRCTable=0;
                $i=0;
			while ($i<$intlength) 
			{
				$bytTMP= ($shortCRC >> 8) ;    //>>: right move bit                              
				$shortCRC=($shortCRC << 8);   //<<: left  move bit
                                $shortCRC=  ($shortCRC & 0x00ffff);
                               // echo " ".$arrayBuf[$shortIndexOfBuf];
				$byteIndex_Of_CRCTable=($bytTMP ^ hexdec($arrayBuf[$shortIndexOfBuf]));
				$shortCRC=($shortCRC ^ $mbufintCRCTable[($byteIndex_Of_CRCTable & 0xFF)]);   //^: xor
				$shortIndexOfBuf=($shortIndexOfBuf+1);
			    $i++;
                            
			}
                        
                         $H_CRC=($shortCRC >> 8);
			 $shortIndexOfBuf=($shortIndexOfBuf+1);
			$L_CRC=($shortCRC & 0x00FF);    
			
			if ($arrayBuf[$i]== dechex($H_CRC) && $arrayBuf[$i+1]==dechex($L_CRC))
		    { 
                            //("CRC correcto");
			    $blnIsCorrenct=true;
		    }
		    else
		    {
		    	$blnIsCorrenct=false;
		    };
		    	   
	    return $blnIsCorrenct;
		
	}  
        
///////////////////////////////////////////////////////////////////////////////////
/////////////////////// funcion single chanel ligth control////////////////////////
//////////////////////////////////////////////////////////////////////////////////        
function singlechanel($subnet,$device,$canal, $valor)
	{
           
           global $arraySend;
           global $L_CRC;
           global $H_CRC;
          // global $socket;
            getIP();
       
           
            $arrayPackCRC[0]=0x0F; // tamaño del paquete a enviar
           $arrayPackCRC[1]=0xFD; // original subnet ID
           $arrayPackCRC[2]=0xFE; //original device ID
           $arrayPackCRC[3]=0xFF; //original device type PC higher then 8  FF // SI NO FUNCIONA PONER 00
           $arrayPackCRC[4]=0xFE; //original device type PC lower then 8   FE // SI NO FUNCIONA PONER 00
           $arrayPackCRC[5]=0x00; //codigo de operacion higher then 8 | single chanel control
           $arrayPackCRC[6]=0x31; //codigo de operacion lower then 8  | single chanel control
           $arrayPackCRC[7]=$subnet; //subnet ID of target device
           $arrayPackCRC[8]=$device; //device ID of target device
           $arrayPackCRC[9]=$canal; // numero de canal ==>18
           $arrayPackCRC[10]=$valor; //Valor de intensidad de luz
           $arrayPackCRC[11]=0x00;
           $arrayPackCRC[12]=0x00;
            PackCRC($arrayPackCRC,count($arrayPackCRC));
           for( $i=0; $i<=count($arrayPackCRC)-1;$i++)
            {
                $arraySend[$i+16]=$arrayPackCRC[$i];
            }
           
            $arraySend[29]=$H_CRC;
            $arraySend[30]=$L_CRC;
         
        enviarDatos($arraySend);
       ReadLightStatus($subnet, $device);
          
}
 ///////////////////////////////////////////////////////////////////////////////////
////////////////////////envia los datos de la trama UDP////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
  function enviarDatos($arraySend){
    
      if (!extension_loaded('sockets')) {
    die('SKIP The sockets extension is not loaded.');
}
global $fp;

 for( $i=0; $i<=count($arraySend)-1;$i++)
            {
                 $char_array[$i]=chr($arraySend[$i]);
               //(" ".($char_array[$i]));
            }
$s = implode($char_array);

$fp = fsockopen("udp://192.168.1.250", 6000, $errno, $errstr);
        if (!$fp) {
           // "ERROR: $errno - $errstr<br />\n";
        } else {
                    fwrite($fp, $s);    
                  //echo fread($fp, 37);
                    fclose($fp);
        }

  }      
        
/////////////////////////////////////////////////////////////////////////////////
  /////////////////////lee el estado de los canales del dispositivo/////////////
  ///////////////////////////////////////////////////////////////////////////////
  function ReadLightStatus($subnet, $device)
 {
       
     $statusligth=array();
      global $L_CRC;
      global $H_CRC;
        global $arraySend;
      getIP();
   
    // global $arrayPackCRC;
           $arrayPackCRC[0]=0x0B; // tamaño del paquete a enviar
           $arrayPackCRC[1]=0xFD; // original subnet ID
           $arrayPackCRC[2]=0xFE; //original device ID
           $arrayPackCRC[3]=0xFF; //original device type PC higher then 8
           $arrayPackCRC[4]=0xFE; //original device type PC lower then 8
           $arrayPackCRC[5]=0x00; //codigo de operacion higher then 8 | single chanel control
           $arrayPackCRC[6]=0x33; //codigo de operacion lower then 8  | single chanel control
           $arrayPackCRC[7]=$subnet; //subnet ID of target device
           $arrayPackCRC[8]=$device; //device ID of target device
                  
           PackCRC($arrayPackCRC,count($arrayPackCRC));
           for($i=0; $i<=count($arrayPackCRC)-1;$i++)
            {
                $arraySend[$i+16]=$arrayPackCRC[$i];
            }
            $arraySend[25]=$H_CRC;
            $arraySend[26]=$L_CRC;
           
            for($i=0;$i<=26;$i++)
            {
                     $peticion[$i]=$arraySend[$i];
                   //(" ".dechex($peticion[$i]));
            }
        
           enviarDatos($peticion);
           $estadoDispositivo=escuchaPuerto($subnet,$device,51,true);
           $numCanales=hexdec($estadoDispositivo[9]);
           if(!$numCanales==null){
           print $subnet." ".$device." ";
           for($i=0;$i<$numCanales;$i++)
           {
               $canales[$i]=$estadoDispositivo[10+$i];
              print hexdec($canales[$i])." ";
           }
           }
  
  }
  function escuchaPuerto($SubnetID,$DeviceID,$intOP,$blnNeedCheckAddressOfFeedback){
     
      set_time_limit(0); //para que no sea interrumpido el script
      $blnSuccess=false;
       	$arraybyteBufWithoutAA=array();
     
        	$intTimes=0;
      
      $lngStartTime_of_MS=round(microtime(true)*1000);  
    		$lngCurTime_of_MS=$lngStartTime_of_MS;
    		while(($lngCurTime_of_MS-$lngStartTime_of_MS)<=4000)
     		{ //iniciamos un bucle infinito para que siempre escuche en el puerto
      $sock=socket_create(AF_INET,SOCK_DGRAM,SOL_UDP); //crea el socket
      if($sock===false){ 
            // 'socket_create Fallo: '.socket_strerror(socket_last_error());
            break;
      }
     if((socket_bind($sock,"192.168.1.23",6000))===false){ //aquí configuramos la IP
         socket_close($sock);
          // 'socket_bind Fallo: '.socket_strerror(socket_last_error());
         break;
     }
      socket_recvfrom($sock,$buf,1024,0,$clientIP,$clientPort); //aquí hace la 
    if($buf===false){ 
          // 'socket_recvfrom() Fallo: '.socket_strerror(socket_last_error());
      }elseif(strlen($buf) === 0) {
          // 'socket_read() Cadena vacia: '.socket_strerror(socket_last_error());
      }
      // "Lectura: $buf <br>"; 
     
      $hex_bytes = str_split($buf, 1);
      for($i=0;$i<=strlen($buf)-1;$i++)
      {
              // " ".bin2hex($hex_bytes[$i]);
              $recibido[$i]=bin2hex($hex_bytes[$i]);
      }
  
      socket_close($sock);//se cierra el socket de lo contrario no podrán 
  //////////////////////////////////////////////////////////////////////////////////////
      /////////////////termina la lectura del puerto////////////////////////////////////
      $intTimes=$intTimes+1;
    				$arraybyteBufTEMP= array();
   				$intOP_H=($recibido[21]*256)& 0xFFFF;
				    $intOP_L=$recibido[22] & 0xFF;
                                  
					$intOP_of_reply=  hexdec($intOP_H+$intOP_L);
						if (($intOP_of_reply==($intOP+1)))
					{
						if ($blnNeedCheckAddressOfFeedback==true)
						{
							$byteSrcSubnetID_of_reply=$recibido[17];
							$byteSrcDeviceID_of_reply=$recibido[18]; 
                                                     	if (($byteSrcSubnetID_of_reply==$SubnetID) & ($byteSrcDeviceID_of_reply==$DeviceID) )
							{
								$blnContinute=true;
							}
							else
							{
								$blnContinute=false;
							}
						}
						else
						{
							$blnContinute=true;
						}
						
						if ($blnContinute==true)
						{
                                                    //echo("comienza a procesar los datos sin aa");
							$arraybyteBufWithoutAA=ProcessUDPPackets($recibido);
		    				if ($arraybyteBufWithoutAA!=null)
		        			{
		    					$blnSuccess=true;
		    					break;
                                                      exit();
		       				}
						}
						
   				    }

                                $lngCurTime_of_MS=round(microtime(true)*1000);  
    				if (($lngCurTime_of_MS-$lngStartTime_of_MS)>4000 )
    				{
    					break;
    				}
} 

        if($blnSuccess)
        {/*
            echo("<br>vector resultante<br>");
            for($i=0;$i<14;$i++)
            {
            echo(" ".$arraybyteBufWithoutAA[$i]);
            }*/
            return $arraybyteBufWithoutAA;
        }
        else
        {
            return null;
        }

  }
   
 
   
    function ProcessUDPPackets($arraybyteRec)
	{
    	$arraybyteBufWithoutHead=null;
    	$intLenOfPackets;
    	$blnIsBigPack=false;
    	
		try
		{
			
			
			$intSizeWithoutHead=0;$intI=0;
			$blnNeedToCheckCRC=false;
					
			$intLenOfPackets=count($arraybyteRec);
		    if (($intLenOfPackets<=0) || ($intLenOfPackets<27) )
	        {
	           return null;
	        }
               $aaH=hexdec($arraybyteRec[14]);
               $aaL=hexdec($arraybyteRec[15]);
               $aa=170;
              
			if ($aaH==$aa && ($aaL==$aa || $aaL==hexdec(85)))// 0x55==>85decimal
			{
			//do nothing
			}
			else
			{
				return null;
			}
				
			if (($arraybyteRec[16] & 0xFF)==0xFF)
			{
				$blnIsBigPack=true;
			}
			else
			{
				$blnIsBigPack=false;
			}

			$intSizeWithoutHead=$intLenOfPackets-16;
			$arraybyteBufWithoutHead=array();
                     //   echo("<br> sin la cabecera<br>"); 
			for($intI=0;$intI<$intSizeWithoutHead;$intI++)
			{
				$arraybyteBufWithoutHead[$intI]=$arraybyteRec[$intI+16];
                                
                             //   echo " ".$arraybyteBufWithoutHead[$intI];
			}
			
			if ($blnIsBigPack==true)
			{
				$blnNeedToCheckCRC=false;
			}
			else
                             {
				$blnNeedToCheckCRC=true;
				
                              }
		    if ($blnNeedToCheckCRC==true)
		    {
		    	if (CheckCRC($arraybyteBufWithoutHead,$intSizeWithoutHead-2)==false)
		    	{
		       		$arraybyteBufWithoutHead=null;
		    	}
		    }
				    
					
		}catch(Exception $e)
		{
			//Toast.makeText(getApplicationContext(), e.getMessage(),
	  		      //    Toast.LENGTH_SHORT).show();	
		}
               
		return $arraybyteBufWithoutHead;
	}
      
    
    
    
//////////////////////////////////////////////////////////////////////////////////
///////// recibe las variables de los controles desde el script///////////////////
//////////////////////////////////////////////////////////////////////////////////  
if(isset($_POST))
{
if (!empty($_POST))//['dev_id'])&&!empty($_POST['subnet'])&&!empty($_POST['canal']))
{
 

$dev_id=$_POST['dev_id'];
$subnet=$_POST['subnet'];
$canal=$_POST['canal'];
$valor=$_POST['valor'];



 //echo "<script type='text/javascript'>alert('$valor');</script>";
if(!$subnet==null && !$dev_id==null && !$canal==null){
 
    singlechanel($subnet, $dev_id, $canal, $valor);
}

}
}


?>

