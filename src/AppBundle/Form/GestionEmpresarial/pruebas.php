<?php

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/beneficiarios/{idBeneficiario}/documentos-soporte", name="beneficiarioSoporte")
     */
    public function beneficiarioSoporteAction(Request $request, $idBeneficiario)
    {
		$em = $this->getDoctrine()->getManager();

        $beneficiarioSoporte = new BeneficiarioSoporte();
        
        $form = $this->createForm(new BeneficiarioSoporteType(), $beneficiarioSoporte);

		$form->add(
			'Guardar', 
			'submit', 
			array(
				'attr' => array(
					'style' => 'visibility:hidden'
				),
			)
		);

		$soportesActivos = $em->getRepository('AppBundle:BeneficiarioSoporte')->findBy(
			array('active' => '1', 'beneficiario' => $idBeneficiario),
			array('fecha_creacion' => 'ASC')
		);

		$histotialSoportes = $em->getRepository('AppBundle:BeneficiarioSoporte')->findBy(
			array('active' => '0', 'beneficiario' => $idBeneficiario),
			array('fecha_creacion' => 'ASC')
		);
		
		$beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
			array('id' => $idBeneficiario)
		);
		
		if ($this->getRequest()->isMethod('POST')) {
			$form->bind($this->getRequest());
			if ($form->isValid()) {

				$tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
					array(
                        'descripcion' => $beneficiarioSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'beneficiario_tipo_soporte'
                    )
				);
				
				$actualizarBeneficiarioSoportes = $em->getRepository('AppBundle:BeneficiarioSoporte')->findBy(
					array(
						'active' => '1' , 
						'tipo_soporte' => $tipoSoporte->getId(), 
						'beneficiario' => $idBeneficiario
					)
				);	
			
				foreach ($actualizarBeneficiarioSoportes as $actualizarBeneficiarioSoporte){
					echo $actualizarBeneficiarioSoporte->getId()." ".$actualizarBeneficiarioSoporte->getTipoSoporte()."<br />";
					$actualizarBeneficiarioSoporte->setFechaModificacion(new \DateTime());
					$actualizarBeneficiarioSoporte->setActive(0);
					$em->flush();
				}
				
				$beneficiarioSoporte->setGrupo($beneficiario);
				$beneficiarioSoporte->setActive(true);
				$beneficiarioSoporte->setFechaCreacion(new \DateTime());
				//$grupoSoporte->setUsuarioCreacion(1);

				$em->persist($beneficiarioSoporte);
				$em->flush();

				return $this->redirectToRoute('beneficiarioSoporte', array( 'idBeneficiario' => $idBeneficiario));
			}
		}	
		
        return $this->render(
			'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:beneficiarios-soporte.html.twig', 
			array(
				'form' => $form->createView(), 
				'soportesActivos' => $soportesActivos, 
				'histotialSoportes' => $histotialSoportes
			)
		);
		
    }
	
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/beneficiarios/{idBeneficiario}/documentos-soporte/{idBeneficiarioSoporte}/borrar", name="beneficiariosSoporteBorrar")
     */
    public function beneficiariosSoporteBorrarAction(Request $request, $idBeneficiario, $idBeneficiarioSoporte)
    {
		$em = $this->getDoctrine()->getManager();

        $beneficiarioSoporte = new BeneficiarioSoporte();
        
		$beneficiarioSoporte = $em->getRepository('AppBundle:BeneficiarioSoporte')->findOneBy(
			array('id' => $idGrupoSoporte)
		);
		
		$beneficiarioSoporte->setFechaModificacion(new \DateTime());
		$beneficiarioSoporte->setActive(0);
		$em->flush();

        return $this->redirectToRoute('beneficiarioSoporte', array( 'idBeneficiario' => $idBeneficiario));
		
    }
