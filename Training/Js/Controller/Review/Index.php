<?php
namespace Training\Js\Controller\Review;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    private $jsonResultFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory
    )
    {
        $this->jsonResultFactory = $jsonResultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->jsonResultFactory->create();
        $result->setData(json_encode($this->getRandomReviewData()));
        return $result;
    }

    private function getRandomReviewData()
    {
        $reviews = [
            ['name' => 'Reviewer 1', 'message' => 'Pellentesque eget bibendum eros. Suspendisse malesuada sapien ac ornare fermentum. Vestibulum non metus nec orci maximus gravida. Vestibulum lacinia at urna quis convallis. Suspendisse finibus est risus, ut molestie lorem lacinia sed. Morbi eget volutpat metus. Nam consectetur, est eget eleifend semper, quam libero rhoncus tortor, quis luctus turpis diam in sapien. Fusce tincidunt, justo non aliquet gravida, felis eros aliquam felis, dignissim efficitur augue turpis quis quam.'
            ],
            ['name' => 'Reviewer 2', 'message' => 'Sed eros orci, consequat vitae quam nec, faucibus ultricies risus. Proin nec ante eu neque feugiat interdum. Cras eu mi et velit faucibus mollis. Cras id interdum mauris. Sed id sagittis neque. Cras finibus venenatis nibh eget eleifend. Mauris non tellus luctus, elementum metus id, ultricies felis. Suspendisse rhoncus luctus quam cursus egestas.'
            ],
            ['name' => 'Reviewer 3', 'message' => 'Vivamus laoreet ultrices dui, id convallis felis molestie at. Curabitur congue aliquet congue. Praesent lobortis enim sed est mattis, eu convallis risus pulvinar. Vivamus vel laoreet metus, vel tempor ante. Donec odio massa, volutpat non mi at, lobortis elementum arcu. Pellentesque venenatis neque vitae sapien gravida, sit amet convallis nunc maximus. Donec sed porttitor nibh. Mauris vitae mattis metus. Nullam tristique eros vitae rhoncus interdum. Nunc vehicula erat sed lectus finibus, in vulputate sapien consectetur. Nulla porta orci ut tincidunt suscipit.'
            ],
            ['name' => 'Reviewer 4', 'message' => 'Sed eu leo iaculis, tempus lorem nec, porta ex. Nullam a nisl sed lectus hendrerit finibus lacinia vitae risus. Proin tempus dignissim iaculis. Suspendisse lacinia leo quis nisl dignissim lobortis. Suspendisse potenti. Donec mi ipsum, suscipit ac nunc nec, ullamcorper ultrices purus. Morbi at euismod nisl. Vivamus ornare maximus lectus eget consequat. Nam cursus ipsum vulputate, facilisis elit eu, faucibus augue. Pellentesque tempus eleifend sem a condimentum. Vivamus lacus lectus, pretium quis pellentesque et, luctus vitae leo. Nam ac nibh sit amet tellus hendrerit consectetur ut et mauris. Duis faucibus semper ante ut bibendum.']
        ];

        return $reviews[rand(0, 3)];
    }
}