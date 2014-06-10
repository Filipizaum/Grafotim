<!DOCTYPE html>
<html>
<head>
	<title>Grafotim</title>
</head>
	<body>
	
		<style type="text/css">
			.title
			{
				width:870;
				font-size:20px;
				color:white;
				font-family:Arial;
				
				
				background-color:green;
				text-align:center;
				
				padding:10px;
				border: 5px solid #885533;
				background-image: url('AgileAgila.bmp') ; 
				background-repeat : no-repeat ;
				background-position: 240px 6px;
			}
			
			.tb
			{
				background-color:#555;
				width:870;
				font-size:20px;
				color:white;
				font-family:Arial;
							
				text-align:center;
				
				padding:10px;
				border: 5px solid #333;
				
			}
			
			.F
			{
				background-color:#aaa;
			}
			
			.V
			{
				background-color:#ddd;
			}
			
			.blok
			{
				border: 4px solid black;
				width:30px;
				padding: 5 0 5 0;
				text-align:center; 
			}
		</style>

		<div class="title" ><img src='agileagila.bmp'/><br><b>Esse &eacute; o programa Grafotim  <br>(C)Copyright Tiaguzaum</b></Div>
		<br>
		<canvas id="canvaa4" width=1024 height=768 onclick='if (!oncegrafotim){defineGNum()};'></canvas>
		<br><br>

		<div class="tb" ><b>Matriz de pontos:</b></Div>
		<br><br>
		<table border=1 align="center" id="matriz">
		</table>	
	</body>

	<script type="text/javascript">
		function CCB()
		{
			picBack = document.getElementById('ccb').value ;
		}

		function mudapos(a)
		{

			if (!begin)
			{
			
				x = a.clientX ;
				y = a.clientY ;

				ctx.beginPath();
				ctx.moveTo(sx,sy);

				for (i=1;i<=ind;i++) 
				{
					ctx.quadraticCurveTo(xb[i],yb[i],xa[i],ya[i]);
				}	
				if (point)
				{
					ctx.lineTo(x,y,x,y);
				}
				else
				{
					ctx.quadraticCurveTo( ((xa[ind]-sx))+(x-(xa[ind]-sx)),((ya[ind]-sy))+(y-(ya[ind]-sy)),xa[ind],ya[ind]);
				}
					
				ctx.fillStyle='#dddddd';
				ctx.fillRect(0,0,900,500);
					
				ctx.strokeStyle = '#ff0000' ;
				ctx.fillStyle = picBack ;
				ctx.lineWidth = 3 ;
				ctx.closePath();
				ctx.stroke();
				ctx.fill();
				
				if (point)
				{
					ctx.strokeStyle = '#00ff00' ;
					ctx.beginPath();
					ctx.moveTo(x,y);
					ctx.lineTo(xa[ind-1],ya[ind-1]);
					ctx.stroke();
				}
				else
				{
					ctx.strokeStyle = '#ff0000' ;
					ctx.beginPath();
					ctx.moveTo(sx,sy);
					ctx.lineTo(xa[ind],ya[ind]);
					ctx.stroke();
				}
				
			}
			
		}
		
		function number(str)
		{
			return parseInt(str.replace(/\D/g, ''),10);
		}
		
	</script>
	
	<script type="text/javascript">
		function atualiza ()
		{
			if(Math.sqrt((nX-X2)*(nX-X2)+(nY-Y2)*(nY-Y2))+R<=R2)
			{
				X=nX;
				Y=nY;
			}
				grd=ctx.createRadialGradient(X,Y,R,X2,Y2,R2);
				grd.addColorStop(0,"red");
				grd.addColorStop(1,"white");
				ctx.fillStyle=grd;
				ctx.fillRect(0,0,300,300);
				ctx.strokeStyle='red';
				ctx.strokeRect(0,0,300,300);
						
			// mostra status
			ctx.fillStyle="00AA00";
			ctx.fillRect(300,10,200,250);
			ctx.fillStyle="FFFFFF";
			ctx.font="italic small-caps bold 20px arial";
			ctx.fillText("X = "+X,300,30);
			ctx.fillText("Y = "+Y,300,50);
			ctx.fillText("X2 = "+X2,300,90);
			ctx.fillText("Y2 = "+Y2,300,110);
			
			if (cent)
			{ctx.fillStyle="Yellow";}
			ctx.fillText("R = "+R,300,70);
			ctx.fillStyle="FFFFFF";
			
			if (!cent)
			{ctx.fillStyle="Yellow";}
			ctx.fillText("R2 = "+R2,300,130);
			ctx.fillStyle="FFFFFF";
		}

		function createNew3(a)
		{
			el = document.getElementById('canvaa3');
			nX = a.clientX-(el.offsetLeft-pageXOffset) ;
			nY = a.clientY-(el.offsetTop-pageYOffset) ;
			atualiza() ;
		}

		function chatrib (a)
		{
			if (a.ctrlKey)
			{
				if(cent)
				{
					if(R>2)
					{
						R=R-2;
					}
				}
				else
				{
					if(R2-2>Math.sqrt((X-X2)*(X-X2)+(Y-Y2)*(Y-Y2))+1)
					{
						if(R2>2)
						{
							R2=R2-2;
						}
					}
				}
			}
			if (a.shiftKey)
			{
				if(cent)
				{
					if(Math.sqrt((X-X2)*(X-X2)+(Y-Y2)*(Y-Y2))+R+2<=R2)
					{
						if(R<R2-2)
						{
							R=R+2;
						}
					}
				}
				else
				{
					R2=R2+2;
				}
			}
			atualiza();
		}

		function swith ()
		{
			if (cent)
			{
				cent = false ;
			}
			else
			{
				cent = true ;
			}
			
			atualiza();
		}
	</script>
	<script type="text/javascript">
	
		ctx = document.getElementById('canvaa3').getContext('2d');
		var grd=1;

		var nX = 1 ;
		var nY = 1 ;
		var	X = 1 ;
		var	Y = 1 ;
		var	R = 5 ;
		var	X2 = 150
		var	Y2 = 160
		var	R2 = 150
		
		// cria primeiro visual
		nX = 150 ;
		nY = 150 ;
		atualiza() ;

		var cent = false ;

		</script> 


			<script type="text/javascript">
		function ponto(x,y)
		{
			this.x = x;
			this.y = y;
		}
		
		function fazAReta (x1,y1,x2,y2)
		{
			cgrafotim.moveTo (x1, y1) ;
			cgrafotim.lineTo (x2, y2) ;
			cgrafotim.stroke () ;
		}
		
		function fazReta (p1, p2, tmp) 
		{
			x1=p1.x;
			x2=p2.x;
			y1=p1.y;
			y2=p2.y;
			
				var t = setTimeout ( "fazAReta ("+x1+", "+y1+", "+x2+", "+y2+")"  , tmp ) ;
		}
		
		function V (i,j) 
		{
			if(i==j) 
			{
				return "0";
			} else
			{
				return "1";
			}
		}
		
		// define contexto para desenhar o quadro
		cgrafotim = document.getElementById('canvaa4').getContext('2d');
		
		// desenha quadro (plano de fundo)
		// pega dimens�es
		wid = document.getElementById('canvaa4').width ;
		hei = document.getElementById('canvaa4').height;
		// desenha bordas marrons
		cgrafotim.fillStyle="#885500";
		cgrafotim.fillRect(0,0,wid,hei); 
		// desenha parte preta
		cgrafotim.fillStyle="#000000";
		cgrafotim.fillRect(10,10,wid-20,hei-20); 
		// escreve texto no quadro
		cgrafotim.fillStyle="#ffffff";
		cgrafotim.font="30px Arial";
		cgrafotim.fillText("Clique Aqui",400,400);
		
		// cria matriz de pontos
		var W = new Array () ;
		var T = new Array () ;
		
		// o grafotim s� pode ser feito uma vez
		var oncegrafotim = false ;
			
		//contruir reta lentamente
		function delai (i,n)
			{
				for (j=i+1;j<n; j++)
				{
					fazReta(W[i],W[j], 45 * j);
				}
			}
		
		function CriaGrafotim(n)
		{
			// define contexto
			cgrafotim = document.getElementById('canvaa4').getContext('2d');
			// limpa o texto do quadro
			cgrafotim.fillStyle="#000000";
			cgrafotim.fillRect(10,10,wid-20,hei-20); 
			
			// escreve quantidade de pontos no quadro
			cgrafotim.fillStyle="#ffffff";
			cgrafotim.font="30px Arial";
			cgrafotim.fillText(n+" pontos",100,100);
			
			// raio do grafo
			R = 50	;
			
			// cria��o da origem
			var O = new ponto (wid/2,hei/2) ;
			
			// configura��es gr�ficas do grafo
			cgrafotim.strokeStyle="#ffffff"; // cor da aresta = branca
			cgrafotim.lineWidth = 3 ; // espesura = 3	
			
			// defini��o condicional da espessura da reta 
			if (n>14)
			{cgrafotim.lineWidth = 2 ;	}  // se tiver muitas retas, espesura = 2
			if (n>18)
			{cgrafotim.lineWidth = 1 ; 	}  // se tiver mais ainda, espesura = 1
			
			// defini��o condicional do tamanho do grafo
			R = 20 + n*15 ;
			if (R>370)
			{R = 370 ; }
			
			//defini��o dos pontos
			for ( k=0 ;k<n ;k++ )
			{	
				W[k] = new ponto (  O.x+ (R* Math.cos ( (Math.PI * 2 * k) / n )  )     ,  O.y+ (R* Math.sin ( (Math.PI * 2 * k) / n )  )  ) ;
				T[k] = new ponto (  O.x+ ((R+25)* Math.cos ( (Math.PI * 2 * k) / n )  )     ,  O.y+ ((R+25)* Math.sin ( (Math.PI * 2 * k) / n )  )  ) ;
			}
			
			
			// algoritmo de cria��o do grafo
			for ( i=0 ;i<n ;i++ )
			{	
				setTimeout ( "delai ("+i+","+n+")" , i*100) ;	
				cgrafotim.fillText(i+1,T[i].x-15,T[i].y+10);
			}
			
			mtrz = document.getElementById("matriz");
			
			textointerno = "";
			
			for (i=0; i<n;i++)
			{
				textointerno=textointerno+"<tr>";
				for (j=0;j<n;j++)
				{
					textointerno=textointerno+"<td class='blok ";
					classe = (V(i,j)=="0") ? 'V':'F' ;
					textointerno=textointerno+ classe ;
					textointerno=textointerno+"'>"+V(i,j)+"</td>";
				}
				textointerno=textointerno+"</tr>";
			}
			
			mtrz.innerHTML = textointerno ;
		}
		function defineGNum()
		{
		
			var cn = false ; // come�a sem confirmar nada
			var tenta = true ;
			var pontosg ;
			do
			{
				pontosg = prompt("digite um numero","11");
			
				if (number(pontosg) > 0)// verifica se � n�mero
				{			
					// verifica se � muito grande o n�mero
					if ( pontosg > 70)
					{	// confirma se � isso que o usu�rio quer
						cn = confirm ('Tem certeza que quer um grafo de '+pontosg+'pontos? /n Pode ser um pouco desagrad�vel para o seu computador.');
					}
				}
				else
				{
					tenta = confirm('Quer tentar outro n�mero?');
				}
			}
			while (pontosg>70 & cn==false & tenta==true) // enquanto o usuario n�o digitar um n�mero menor que 70 e n�o disser que quer maltratar o processador
					
			if (tenta){oncegrafotim=true;CriaGrafotim(number(pontosg));};
		}
		
	</script> 


</html>	
