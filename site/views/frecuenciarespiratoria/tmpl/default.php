<?php
defined('_JEXEC') or die;

JHtml::_('behavior.formvalidator');

JFactory::getDocument()->addScriptDeclaration("
    Joomla.submitbutton = function(task)
    {
        if (document.formvalidator.isValid(document.getElementById('adminForm')))
        {        
            Joomla.submitform(task, document.getElementById('adminForm'));
        }
    };
");

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

<div class="row-fluid">
    
    <form action="<?php echo JRoute::_('index.php?option=com_frecuenciarespiratoria'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">

        <div class="header">

            <h1><span class="site-title" title="Frecuencia respiratoria"><a href="frecuencia-respiratoria">Frecuencia respiratoria</a></span></h1>
            <h2><span class="site-title" title="Frecuencia respiratoria"><legend>Frecuencia respiratoria</legend></span></h2>

        </div>

            </br>

            <h1 id="digitosReloj" style="font-size: 60px;">00</h1>

            <!--</br>

            <progress value="0" max="5" id="progressBar"></progress>-->

            </br></br>

            <button id="empezar" onclick="countdown()" class="btn">Empezar</button>

            </br></br>

                <div class="span10 form-horizontal">
                    <!-- 
                    <div class="control-group">
                        
                        <div class="control-label">
                            <label class="control-label hasPopover required validate-numeric" 
                                   data-original-title="Frecuencia respiratoria" 
                                   data-content="Número de respiraciones del paciente">
                                Número entre 1 y 300:
                            </label>
                        </div>

                        <div class="controls">
                            <input id="numeroIntroducido" 
                                   name="numeroIntroducido" 
                                   oninput="calculateData()"
                                   placeholder="Número de respiraciones">
                        </div>

                    </div> -->
                    
                    <div class="control-group">
                        <div class="control-label">
                            <label id="numeroIntroducido-lbl" 
                                   for="numeroIntroducido" 
                                   class="hasPopover required" 
                                   title="Número de respiraciones" 
                                   data-content="Número de respiraciones" 
                                   data-original-title="Frecuencia respiratoria">
                                   Número entre 1 y 300<span class="star">&nbsp;*</span>
                            </label>
                        </div>
                        <div class="controls">
                            <input 
                                type="text" 
                                name="numeroIntroducido" 
                                id="numeroIntroducido" 
                                value="" 
                                oninput="calculateData()"
                                class="inputbox required validate-numeric" 
                                size="100" 
                                placeholder="Número de respiraciones" 
                                required="required" 
                                aria-required="true">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="control-label">
                            <label id="nombrePropietario-lbl" 
                                   for="nombrePropietario" 
                                   class="hasPopover required" 
                                   title="Nombre del propietario" 
                                   data-content="Nombre del propietario" 
                                   data-original-title="Frecuencia respiratoria">
                                   Nombre del propietario<span class="star">&nbsp;*</span>
                            </label>
                        </div>
                        <div class="controls">
                            <input 
                                type="text" 
                                name="nombrePropietario" 
                                id="nombrePropietario" 
                                value="" 
                                class="inputbox required" 
                                size="100" 
                                placeholder="Nombre del propietario" 
                                required="required" 
                                aria-required="true">
                        </div>
                    </div> 
                    
                    <div class="control-group">
                        <div class="control-label">
                            <label id="nombrePaciente-lbl" 
                                   for="nombrePaciente" 
                                   class="hasPopover required" 
                                   title="Nombre del paciente" 
                                   data-content="Nombre del paciente" 
                                   data-original-title="Frecuencia respiratoria">
                                   Nombre del paciente<span class="star">&nbsp;*</span>
                            </label>
                        </div>
                        <div class="controls">
                            <input 
                                type="text" 
                                name="nombrePaciente" 
                                id="nombrePaciente" 
                                value="" 
                                class="inputbox required" 
                                size="100" 
                                placeholder="Nombre del paciente" 
                                required="required" 
                                aria-required="true">
                        </div>
                    </div>
                    
                </div>


            </br></br>
            <div class="clearfix"></div>

            <div class="inner well">
                <h2 id="textoFrecuenciaRespiratoria">Frecuencia respiratoria</h2>
            </div>

            <div class="btn-group pull-left">
                <button id="guardarFrecuenciaRespiratoria" type="submit" class="btn btn-primary validate" 
                        onclick="
                            if (document.adminForm.resultado.value == 0) { 
                                alert('<?php echo JText::_('Debes calcular la frecuencia respiratoria antes de guardar') ?>'); } 
                            else {
                                Joomla.submitbutton('updfrecuenciarespiratoria.add')
                            } ">
                    <i class="icon-new"></i> <?php echo JText::_('Guardar') ?>
                </button>
            </div>

        <input type="hidden" name="resultado" id="resultado" value="0"/>
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <?php echo JHtml::_('form.token'); ?>

    </form>
    
</div>

</br></br>