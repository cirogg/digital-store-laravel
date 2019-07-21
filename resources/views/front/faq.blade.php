@extends('front.template')
<main>

  @section('mainContent')
      
  <section class="section-container">
    
    <h2>Preguntas Frecuentes</h2>
    
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              ¿Cómo me registro?
            </button>
          </h5>
        </div>
        
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body faq-text">
            Para darse de alta como usuario de Digital Store, se debe hacer click en la opción “Registrarse” ubicada en la parte superior del menú. Se accede al Formulario de Registro donde se deben completar los datos requeridos.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              ¿Cómo ver el estado de mi pedido?
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body faq-text">
            Una vez logueado, se debe ingresar en "Mi cuenta", ubicado en la parte superior de la barra de menú. Haciendo click en este lugar se accede a “Mis pedidos realizados”, donde se puede observar el estado de avance de cada artículo y su estatus actual.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              ¿Cómo hago seguimiento de mi pedido?
            </button>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body faq-text">
            Al momento, el sistema de compra no tiene habilitado un sistema de tracking o seguimiento de su pedido, te mantedremos informado por email del estado del mismo.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingFour">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              ¿Cómo realizo un cambio?
            </button>
          </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body faq-text">
            Para productos comprados en Digital Store, el cambio se puede realizar dentro de los 10 días corridos contados a partir de la entrega del producto.
            
            Para realizar el cambio, el producto debe estar en perfecto estado de uso, completo, con embalaje original, factura de compra o ticket de regalo. Una vez recibido el producto, se verificará y solo si cumple con los requisitos se procederá al cambio.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingFive">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              ¿Quién puede recibir la compra?
            </button>
          </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body faq-text">
            Podrá recibir la compra cualquier persona mayor de 18 años, mostrando DNI.
            Es importante que quien recibe, firme el remito de entrega y verifique el estado del producto.
          </div>
        </div>
      </div>
    </div>

  </section>
  
@endsection
  
</main>
