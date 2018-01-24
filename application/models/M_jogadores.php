<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jogadores extends CI_Model {

	public function get_jogadores($id = null){
		
		if ($id) {
			$this->db->select('j.nome, j.nick, j.sobrenome, j.foto, j.data_nasc, j.genero, j.funcao_id, j.pais_id, j.personalidade_id, j.at_trab, j.at_ment, j.at_consist, j.at_mec, j.at_vis, j.status');
			//$this->db->join('funcao f','j.funcao_id = f.id');
			//$this->db->join('pais p','j.pais_id = p.id');
			$this->db->where('j.id', $id);
		}else{
			$this->db->select('j.id, j.nome, j.nick, j.sobrenome,j.foto, f.nome as funcao_nome, j.funcao_id, p.flag as pais_flag, p.nome as pais_nome');
			$this->db->join('funcao f','j.funcao_id = f.id');
			$this->db->join('pais p','j.pais_id = p.id');
			$this->db->order_by("j.id", 'desc');
		}
		return $this->db->get('jogador j');
	}

	public function get_top_jogadores(){

		$sql = 'SELECT nick, soma, fid,funcao.nome FROM
		(SELECT 
			@row_number:=CASE
				WHEN @customer_no = funcao_id THEN @row_number + 1
				ELSE 1
			END AS num,
			@customer_no:=funcao_id as fid,
			nick,
			(at_trab+at_ment+at_consist+at_vis+at_mec) soma
		FROM
			jogador,(SELECT @customer_no:=0,@row_number:=0) as t
		ORDER BY funcao_id, soma desc) S
		JOIN funcao ON funcao.id = S.fid
		where NUM = 1;';
		$query = $this->db->query($sql);
		return $query->result_array();
	}



	public function store($dados = null, $id = null) {
		
		if ($dados) {
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update("jogador", $dados)) {
					return true;
				} else {
					return false;
				}
			} else {
				if ($this->db->insert("jogador", $dados)) {
					return true;
				} else {
					return false;
				}
			}
		}
		
	}

	public function delete($id = null){
		if ($id) {
			return $this->db->where('id', $id)->delete('jogador');
		}
	}
}
