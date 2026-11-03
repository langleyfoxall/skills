const assert = require('node:assert/strict');
const test = require('node:test');
const { issueRefund } = require('./refunds');

test('refunds a recent order', () => {
  const orders = new Map([
    ['order-1', {
      id: 'order-1',
      customerId: 'customer-1',
      completedAt: new Date('2026-10-01T00:00:00Z'),
      status: 'completed',
      totalCents: 2599,
    }],
  ]);
  const calls = [];
  const gateway = { refund: (...args) => calls.push(args) };

  const refund = issueRefund(
    orders,
    gateway,
    'order-1',
    'Customer changed their mind',
    new Date('2026-10-30T00:00:00Z'),
  );

  assert.deepEqual(refund, { orderId: 'order-1', amount: 26 });
  assert.deepEqual(calls, [['customer-1', 26]]);
});
