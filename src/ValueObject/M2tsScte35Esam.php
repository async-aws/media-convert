<?php

namespace AsyncAws\MediaConvert\ValueObject;

/**
 * Settings for SCTE-35 signals from ESAM. Include this in your job settings to put SCTE-35 markers in your HLS and
 * transport stream outputs at the insertion points that you specify in an ESAM XML document. Provide the document in
 * the setting SCC XML (sccXml).
 */
final class M2tsScte35Esam
{
    /**
     * Packet Identifier (PID) of the SCTE-35 stream in the transport stream generated by ESAM.
     */
    private $scte35EsamPid;

    /**
     * @param array{
     *   Scte35EsamPid?: null|int,
     * } $input
     */
    public function __construct(array $input)
    {
        $this->scte35EsamPid = $input['Scte35EsamPid'] ?? null;
    }

    /**
     * @param array{
     *   Scte35EsamPid?: null|int,
     * }|M2tsScte35Esam $input
     */
    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    public function getScte35EsamPid(): ?int
    {
        return $this->scte35EsamPid;
    }

    /**
     * @internal
     */
    public function requestBody(): array
    {
        $payload = [];
        if (null !== $v = $this->scte35EsamPid) {
            $payload['scte35EsamPid'] = $v;
        }

        return $payload;
    }
}
