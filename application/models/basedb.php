<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class basedb extends CI_Model
    {
      public function can_login()
            {
                $this->db->where('userid', $this->input->post('usrid'));
                $this->db->where('password', md5($this->input->post('pass')));
                $query =$this->db->get('user_data');
                if($query->num_rows() == 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            public function user_check()
            {
                $this->db->where('userid', $this->input->post('email'));
                
                $query =$this->db->get('user_data');
                if($query->num_rows() == 1)
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }
            public function record_update($table, $data, $year)
            {
             
               $query = $this->db->insert($table, $data);
              
            }
            public function find_data($table, $fild, $data)
            {
                $this->db->where($fild, $data);
                $query = $this->db->get($table);
                if($query)
                {
                  return true;
                }
            }
             public function get_data($table, $fild, $data)
            {
               $this->db->join('year', 'year.id = record.year');
                $this->db->join('course', 'course.id = record.course_id');
                $this->db->join('msc_subject', 'msc_subject.id = record.subject_code');
                $this->db->where($fild, $data);
                $query = $this->db->get($table);
                if($query)
                {
                  return $query->result();
                }
            }
            public function record_upload($table, $record_data)
            {
              $this->db->insert($table, $record_data);
            }
            public function search($class, $subject , $name,$title, $start , $end )
            {
              $this->db->join('year', 'year.id = record.year');
                $this->db->join('course', 'course.id = record.course_id');
                $this->db->join('msc_subject', 'msc_subject.id = record.subject_code');
              if(($class != NULL) && ($subject !=NULL) )
              {
                $this->db->where('course.id', $class);
                $this->db->where('subject_code', $subject);
              }
              else
              {
                $this->db->like('name', strtolower($name));
                $this->db->or_like('title', strtolower($title));              
                $this->db->or_like('chairman', strtolower($title));
                $this->db->or_like('members', strtolower($title));
                $this->db->or_like('keywords', strtolower($title));
              }
            
              $this->db->limit($start, $end);
              $query = $this->db->get('record');
              return $query->result();
               
            }
            
            public function search_total($name, $title)
            {
               
              $this->db->join('year', 'year.id = record.year');
              $this->db->join('course', 'course.id = record.course_id');
              $this->db->join('msc_subject', 'msc_subject.id = record.subject_code');
              $this->db->like('name', strtolower($name));
              $this->db->or_like('title', strtolower($title));
              
              $this->db->or_like('chairman', strtolower($title));
              $this->db->or_like('members', strtolower($title));
              $this->db->or_like('keywords', strtolower($title));
              $query = $this->db->get('record');
              return $query->num_rows();               
            }
            public function getdata($field , $key , $data)
            {
              $this->db->where($field, $key);
              $query  = $this->db->get($data);
                if($query == true)
                {
                  return $query->result();
                }
                else
                {
                  return false;
                }
            }
            public function get_year($data)
            {
             
              $query  = $this->db->get($data);
                if($query == true)
                {
                  return $query->result();
                }
                else
                {
                  return false;
                }
            }
            public function search_data($course_id, $subject_code)
            {
              $this->db->where('course_id',$course_id);
              $this->db->where('subject_code',$subject_code);
            
              $query = $this->db->get('record');
              return $query->result();
            }
            
            public function search_data_by_year($course_id, $subject_code, $year)
            {
              $this->db->join('year', 'year.id = record.year');
              $this->db->join('course', 'course.id = record.course_id');
              $this->db->join('msc_subject', 'msc_subject.id = record.subject_code');
              $this->db->where('record.course_id',$course_id);
              $this->db->where('record.subject_code',$subject_code);
              $this->db->where('year.id', $year);       
              $query = $this->db->get('record');
              return $query->result();
            }
            public function check_unique($table, $field, $values)
            {
                $this->db->where($field, $values);
                
                $query =$this->db->get($table);
                if($query->num_rows() > 0)
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }
           
    }
