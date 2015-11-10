	/**
     * @Route("/gestion-administrativa/gestion-POA/POA/", name="POAGestion")
     */
    public function POAGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $poas = $em->getRepository('AppBundle:POA')->findAll(); 

        return $this->render('AppBundle:GestionAdministrativa/GestionPOA:POA-gestion.html.twig', array( 'poas' => $poas));
    }

	/**
     * @Route("/gestion-administrativa/gestion-POA/POA/nuevo", name="POANuevo")
     */
    public function POANuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $poa = new POA();
        
        $form = $this->createForm(new POAType(), $poa);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $poa = $form->getData();

            $poa->setActive('true');


            
            $em->persist($poa);
            $em->flush();

            return $this->redirectToRoute('gruposGestion');
        }
		 return $this->render('AppBundle:GestionAdministrativa/GestionPOA:POA-nuevo.html.twig', array('form' => $form->createView()));
    }