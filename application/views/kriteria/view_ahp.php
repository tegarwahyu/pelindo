<div class="col-lg-12">
<div class="jumbotron">
  <h1 class="display-4">Sistem Pendukung Keputusan Tiketing dengan AHP</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="<?php echo base_url('kriteria/kriteria/data_kriteria')?>" role="button">Mulai</a>
  </p>
</div>

<div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="mb-3 card">
        	<div class="card-body">
        		<div class="panel-heading">
        		<h5 class="card-title">Nilai Preferensi</h5>
        		</div>
        		<div class="panel-body">
					<ol>
						<?php
						foreach ($skala as $key => $value) {
							echo "$key. $value->NAME_SCALE <br>";
						}
						?>
					</ol>
				</div>
        	</div>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="mb-3 card">
        	<div class="card-body">
        		<h5 class="card-title">Kriteria</h5>
        		<div class="panel-body">
					<ol>
						<?php
						foreach ($kriteria as $key => $value) {
							echo ($key+1).". $value->NAME_CRITERIA<br>";
						}
						?>
					</ol>
				</div>
        	</div>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="mb-3 card">
        	<div class="card-body">
        		<h5 class="card-title">Alternatif</h5>
        		<div class="panel-body">
					<ol>
						<?php
						foreach ($alternatif as $key => $value) {
							echo ($key+1).". $value->DEMAGE_DETAILS<br>";
						}
						?>
					</ol>
				</div>
        	</div>
        </div>
    </div>
</div>