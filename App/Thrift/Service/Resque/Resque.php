<?php
/**
 * Autogenerated by Thrift Compiler (0.9.3)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 * @generated
 */
namespace App\Thrift\Service\Resque;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

interface ResqueIf
{
    /**
     * @param \App\Thrift\Service\Resque\Params $params
     * @return string
     * @throws \App\Thrift\Service\Resque\InvalidValueException
     */
    public function enqueue(\App\Thrift\Service\Resque\Params $params);
}

class ResqueClient implements \App\Thrift\Service\Resque\ResqueIf
{
    protected $input_ = null;
    protected $output_ = null;

    protected $seqid_ = 0;

    public function __construct($input, $output = null)
    {
        $this->input_ = $input;
        $this->output_ = $output ? $output : $input;
    }

    public function enqueue(\App\Thrift\Service\Resque\Params $params)
    {
        $this->send_enqueue($params);
        return $this->recv_enqueue();
    }

    public function send_enqueue(\App\Thrift\Service\Resque\Params $params)
    {
        $args = new \App\Thrift\Service\Resque\Resque_enqueue_args();
        $args->params = $params;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'enqueue', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('enqueue', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_enqueue()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\App\Thrift\Service\Resque\Resque_enqueue_result', $this->input_->isStrictRead());
        else {
            $rseqid = 0;
            $fname = null;
            $mtype = 0;

            $this->input_->readMessageBegin($fname, $mtype, $rseqid);
            if ($mtype == TMessageType::EXCEPTION) {
                $x = new TApplicationException();
                $x->read($this->input_);
                $this->input_->readMessageEnd();
                throw $x;
            }
            $result = new \App\Thrift\Service\Resque\Resque_enqueue_result();
            $result->read($this->input_);
            $this->input_->readMessageEnd();
        }
        if ($result->success !== null) {
            return $result->success;
        }
        if ($result->e !== null) {
            throw $result->e;
        }
        throw new \Exception("enqueue failed: unknown result");
    }

}

// HELPER FUNCTIONS AND STRUCTURES

class Resque_enqueue_args
{
    static $_TSPEC;

    /**
     * @var \App\Thrift\Service\Resque\Params
     */
    public $params = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                1 => array(
                    'var' => 'params',
                    'type' => TType::STRUCT,
                    'class' => '\App\Thrift\Service\Resque\Params',
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['params'])) {
                $this->params = $vals['params'];
            }
        }
    }

    public function getName()
    {
        return 'Resque_enqueue_args';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->params = new \App\Thrift\Service\Resque\Params();
                        $xfer += $this->params->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('Resque_enqueue_args');
        if ($this->params !== null) {
            if (!is_object($this->params)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('params', TType::STRUCT, 1);
            $xfer += $this->params->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class Resque_enqueue_result
{
    static $_TSPEC;

    /**
     * @var string
     */
    public $success = null;
    /**
     * @var \App\Thrift\Service\Resque\InvalidValueException
     */
    public $e = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                0 => array(
                    'var' => 'success',
                    'type' => TType::STRING,
                ),
                1 => array(
                    'var' => 'e',
                    'type' => TType::STRUCT,
                    'class' => '\App\Thrift\Service\Resque\InvalidValueException',
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['success'])) {
                $this->success = $vals['success'];
            }
            if (isset($vals['e'])) {
                $this->e = $vals['e'];
            }
        }
    }

    public function getName()
    {
        return 'Resque_enqueue_result';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 0:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->success);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->e = new \App\Thrift\Service\Resque\InvalidValueException();
                        $xfer += $this->e->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('Resque_enqueue_result');
        if ($this->success !== null) {
            $xfer += $output->writeFieldBegin('success', TType::STRING, 0);
            $xfer += $output->writeString($this->success);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->e !== null) {
            $xfer += $output->writeFieldBegin('e', TType::STRUCT, 1);
            $xfer += $this->e->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class ResqueProcessor
{
    protected $handler_ = null;

    public function __construct($handler)
    {
        $this->handler_ = $handler;
    }

    public function process($input, $output)
    {
        $rseqid = 0;
        $fname = null;
        $mtype = 0;

        $input->readMessageBegin($fname, $mtype, $rseqid);
        $methodname = 'process_' . $fname;
        if (!method_exists($this, $methodname)) {
            $input->skip(TType::STRUCT);
            $input->readMessageEnd();
            $x = new TApplicationException('Function ' . $fname . ' not implemented.', TApplicationException::UNKNOWN_METHOD);
            $output->writeMessageBegin($fname, TMessageType::EXCEPTION, $rseqid);
            $x->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
            return;
        }
        $this->$methodname($rseqid, $input, $output);
        return true;
    }

    protected function process_enqueue($seqid, $input, $output)
    {
        $args = new \App\Thrift\Service\Resque\Resque_enqueue_args();
        $args->read($input);
        $input->readMessageEnd();
        $result = new \App\Thrift\Service\Resque\Resque_enqueue_result();
        try {
            $result->success = $this->handler_->enqueue($args->params);
        } catch (\App\Thrift\Service\Resque\InvalidValueException $e) {
            $result->e = $e;
        }
        $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($output, 'enqueue', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
        } else {
            $output->writeMessageBegin('enqueue', TMessageType::REPLY, $seqid);
            $result->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
        }
    }
}