<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Cliente{
		//Atributos
		private $cod;







		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}

			return $this->nome;
		}

			return $this->email;
		}

			return $this->senha;
		}

			return $this->telefone;
		}

			return $this->endereco;
		}

			return $this->foto;
		}

		public function setCod($cod){
			$this->cod=$cod;
		}

			$this->nome=$nome;
		}

			$this->email=$email;
		}

			$this->senha=$senha;
		}

			$this->telefone=$telefone;
		}

			$this->endereco=$endereco;
		}

			$this->foto=$foto;
		}

	}
?>