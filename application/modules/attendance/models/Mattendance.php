<?php 
/**
 * 
 */
class Mattendance extends CI_Model
{
	
	function __construct()
	{
		// code...
		parent::__construct();
	}
	public function add($data='')
	{
		// code...
		$this->db->insert('events_attendance',$data);
		return $this->db->insert_id();
	}
	public function update($data)
	{
		// code...
		$this->db->where('id',$data->id);
		$this->db->update('events_attendance',$data);
	}
	public function find($data='')
	{
		// code...
		return $this->db->get_where('events_attendance',$data)->result();
	}
	public function list($data='')
	{

		// code...
		$this->db
			->select('events_attendance.*,concat(fName," ",mName," ",lName) as student_name,course.course_sub_title,grade,section,(penalty_late * late) as bayad_late,(penalty_absent * absent) as bayad_absent,event_title')
			->from('events_attendance')
			->join('events','events.id = events_attendance.event_id')
			->join('students','students.code = events_attendance.student_id')
			->join('course_students','course_students.student_id = students.id')
			->join('course','course.id = course_students.course_id')
			->where('events_attendance.penalty_late',1)
			->group_by('date_of_event,event_id,student_id');
			$query = $this->db->get();
		return $query->result();
	}
	public function like($data)
	{
		$sql = $this->db->select('*')
				->from('events_attendance')
				->like('keywords',$data['keywords'])
				->or_like('keywords_2',$data['keywords']);
				//->get();
		 //return $this->db->get_compiled_select();

		 //$query = $this->db->($sql);//
		 return $this->db->get()->result();
	}

	public function listbyevent($event_id=0)
	{
		// code...
		//return $this->db->order_by('timein','DESC')->get_where('events_attendance',array('event_id'=>$event_id))->result();
			$this->db
			->select('events_attendance.*,concat(fName," ",mName," ",lName) as student_name')
			->from('events_attendance')
			->join('students','students.code = events_attendance.student_id')
			->where('event_id',$event_id);
			$query = $this->db->get();
			return $query->result();

		return null;


	}
}

 ?>