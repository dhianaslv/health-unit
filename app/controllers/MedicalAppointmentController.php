<?php
    namespace app\controllers;
    use src\services\MedicalAppointmentService;
    
    class MedicalAppointmentController{
        private $medical_appointment_service;

        public function __construct()
        {
            $this->medical_appointment_service =  new MedicalAppointmentService();
        }
        
        public function makeAnAppointment($patient_cpf, 
        $genre, $specialty, $date, $time, $room){
            
            $result = $this->medical_appointment_service->makeAnAppointment($patient_cpf, 
            $genre, $specialty, $date, $time, $room);
              
            return $result;
        }

        public function allMedicalAppointments($start, $total_records){
            $result = $this->medical_appointment_service->allMedicalAppointments($start, $total_records);
                
            return $result;
        }

        public function fetchMedicalAppointment($id){
            
            $result = $this->medical_appointment_service->fetchMedicalAppointment($id);
            
            return $result;
        }

        public function update($medical_appointment){
            
            $result = $this->medical_appointment_service->update($medical_appointment);
              
            return $result;
        }
    }
