<?php
defined('_JEXEC') or die;
?>

<script>

function calculateData() {

    var x, text, result;
    x = document.getElementById("numeroIntroducido").value;

    if (isNaN(x) || x < 1 || x > 300) {
        text = "Error: el número no es válido";
        document.getElementById("guardarFrecuenciaRespiratoria").disabled = true;
    } else {
        result = x * 2;
        text = "La Frecuencia respiratoria es: " + result;	
        document.getElementById("guardarFrecuenciaRespiratoria").disabled = false;
    }
    
    document.getElementById("textoFrecuenciaRespiratoria").innerHTML = text;
    document.getElementById("resultado").value = result;
        
}

function countdown() {

   document.getElementById("textoFrecuenciaRespiratoria").innerHTML = 'Frecuencia respiratoria';
   document.getElementById("empezar").disabled = true;
   document.getElementById("guardarFrecuenciaRespiratoria").disabled = true;

    var timeLeft = 30;
    var elem = document.getElementById('digitosReloj');
    var timerId = setInterval(countdown, 1000);

        function countdown() {
          if (timeLeft == 0) {
                clearTimeout(timerId);
                elem.innerHTML = '00';
                //document.getElementById("progressBar").value = 0;
                document.getElementById("numeroIntroducido").value = ''
                document.getElementById("textoFrecuenciaRespiratoria").innerHTML = 'Frecuencia respiratoria';
                document.getElementById("empezar").disabled = false;
                document.getElementById("guardarFrecuenciaRespiratoria").disabled = false;
          } else {
                elem.innerHTML = timeLeft;
                //document.getElementById("progressBar").value = timeLeft;
                timeLeft--;
          }
        }

}

</script>

<form action="<?php echo JRoute::_('index.php?option=com_frecuenciarespiratoria'); ?>" method="post" name="adminForm" id="adminForm">
    
    <div class="header">

        <h1><span class="site-title" title="Frecuencia respiratoria"><a href="frecuencia-respiratoria">Frecuencia respiratoria</a></span></h1>
        <h2><span class="site-title" title="Frecuencia respiratoria"><legend>Frecuencia respiratoria</legend></span></h2>

        </br>

        <h1 id="digitosReloj" style="font-size: 60px;">00</h1>

        <!--</br>

        <progress value="0" max="5" id="progressBar"></progress>-->

        </br></br>

        <button id="empezar" onclick="countdown()" class="btn">Empezar</button>

        </br></br>

        <p>Número entre 1 y 300:</p>
        <input id="numeroIntroducido" name="numeroIntroducido" oninput="calculateData()">

        </br></br>

        <div class="inner well">
            <h2 id="textoFrecuenciaRespiratoria">Frecuencia respiratoria</h2>
        </div>
        
        <div class="btn-group pull-left">
                <button id="guardarFrecuenciaRespiratoria" type="button" class="btn btn-primary" 
                        onclick="
                            if (document.adminForm.resultado.value == 0) { 
                                alert('<?php echo JText::_('Debes calcular la frecuencia respiratoria antes de guardar') ?>'); } 
                            else {
                                Joomla.submitbutton('updfrecuenciarespiratoria.add')
                            } ">
                    <i class="icon-new"></i> <?php echo JText::_('Guardar') ?>
                </button>
            </div>

    </div>
    
    <input type="hidden" name="resultado" id="resultado" value="0"/>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <?php echo JHtml::_('form.token'); ?>
    
</form>

</br></br>