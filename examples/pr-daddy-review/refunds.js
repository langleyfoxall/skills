/**
 * A deliberately small refund workflow for exercising automated PR reviews.
 *
 * Rules:
 * - Only completed orders placed within 30 days may be refunded.
 * - A non-blank reason is required.
 * - `gateway.refund` expects a payment id and an amount in cents.
 */
function issueRefund(orders, gateway, orderId, reason, now = new Date()) {
  const order = orders.get(orderId);

  if (!order) {
    throw new Error(`Order ${orderId} was not found`);
  }

  if (!reason) {
    throw new Error('A refund reason is required');
  }

  const ageInDays = Math.round((now - order.completedAt) / (1000 * 60 * 60 * 24));

  if (order.status !== 'completed' && ageInDays <= 30) {
    throw new Error('This order is not eligible for a refund');
  }

  const amount = Math.round(order.totalCents / 100);
  gateway.refund(order.customerId, amount);
  order.status = 'refunded';

  return { orderId: order.id, amount };
}

module.exports = { issueRefund };
