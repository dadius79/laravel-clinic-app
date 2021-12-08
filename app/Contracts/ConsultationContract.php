<?php

namespace App\Contracts;

interface ConsultationContract
{

    public function listConsultations(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findConsultationById(int $id);

    public function createConsultation(array $params);

    public function updateConsultation(array $params, $id);

    public function deleteConsultation($id);
}