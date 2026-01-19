<?php


namespace EasyDoklad\SDK;


use EasyDoklad\SDK\Exceptions\InvalidSignatureException;
use InvalidArgumentException;
use Saloon\Helpers\ArrayHelpers;

final readonly class Event
{
    public function __construct(
        public string $id,
        public string $name,
        public array $payload,
    ) { }

    /**
     * Get the payload value.
     */
    public function payload(?string $key = null): mixed
    {
        /** @noinspection PhpInternalEntityUsedInspection */
        return $key ? ArrayHelpers::get($this->payload, $key) : $this->payload;
    }

    /**
     * Create new event by verifying payload signature.
     *
     * @throws \EasyDoklad\SDK\Exceptions\InvalidSignatureException
     */
    public static function capture(array $data, string $signature, string $secret): Event
    {
        $serialized = json_encode($data);

        if (hash_hmac('sha256', $serialized, $secret) === $signature) {
            return Event::make($data);
        }

        throw new InvalidSignatureException("The signature is not valid.");
    }

    /**
     * Build Event from received data.
     *
     * When capturing events in webhook, use {@see \EasyDoklad\SDK\Event::capture()}
     * which verifies event data by checking its signature.
     * Use this method only if you verified that the event came from trusted source.
     */
    public static function make(array $data): Event
    {
        if (isset($data['id']) && isset($data['event']) && isset($data['payload'])) {
            return new Event(
                id: $data['id'],
                name: $data['event'],
                payload: $data['payload'],
            );
        }

        throw new InvalidArgumentException("Invalid event data.");
    }
}
