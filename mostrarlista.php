<a href="<?php foreach ($this->canciones as $c) { ?>
						<!-- variable que viene del controlador y recibe views -->
						<?= $c['nombre'] ?> <br />
					<?php } ?>">